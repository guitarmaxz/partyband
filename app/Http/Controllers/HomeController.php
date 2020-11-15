<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Genero;
use App\Http\Requests\PerfilRequest;
use App\Musico;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $user;
    private $musician;


     public function __construct(User $user, Musico $musician)
    {
        $this->user = $user;
        $this->musician = $musician;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        if(Auth()->User()->perfil == "Administrador")
        {
            return redirect()->route('admin.instrumentos.index');
        }
        else{ 
            $users = $this->user->all('perfil');
            $usuarios = DB::table('users')
                            ->join('musicos', 'users.id', '=', 'musicos.user_id')
                            ->join('federacaos', 'musicos.fed_id', '=', 'federacaos.id')
                                ->select('users.username', 'musicos.foto', 'musicos.user_id', 'federacaos.uf', 'musicos.nome')->where('users.perfil', '=', 'Comum')
                                ->orderBy('users.id', 'DESC')
                                ->paginate(3);
            /* $postagens = DB::table('posts')->select('user_id', 'postagem', 'imagem')->orderBy('id', 'DESC'); */
            $query = DB::select('SELECT u.username, m.user_id, m.foto, p.postagem, p.imagem, p.usuario_id, p.created_at FROM users u LEFT JOIN posts p on(u.id = p.usuario_id) INNER JOIN musicos m on(m.user_id = u.id) WHERE p.usuario_id = u.id ORDER BY p.created_at DESC');
            
            /*$postagens = $postagens->get(); */
            return view('home', compact('usuarios', 'users', 'query'));
        }   
    }

   

    public function perfil()
    {   
        if(Auth()->User()->musicos == null)
        {
            flash('Necessário preencher o formulário para acessar o perfil')->error();
            return redirect()->route('cadastro');
        }

        if(Auth()->User()->perfil == "Administrador")
        {
            return redirect()->back()->with('danger', 'Autenticação feita por administrador, favor utilizar o login do administrador');  
        
        }
        else{
            $generos = Genero::all();
            $musicos = $this->musician->all();  
            $usuariolog = Auth()->User()->id;
            $postagens = DB::table('posts')->select('postagem')->where('usuario_id', Auth::id())->get();
            
        $query = DB::select("SELECT u.username, m.foto, p.postagem, p.imagem, p.usuario_id, m.user_id FROM users u LEFT JOIN posts p on(u.id = p.usuario_id) INNER JOIN musicos m on(m.user_id = u.id) WHERE u.id = '{$usuariolog}' ");
                                
            return view('perfil',compact('generos', 'postagens', 'query', 'musicos'));   
        }
    }

    public function update(Request $request)
    {
        //DADOS
        $data = $request->all();
        $usu = Auth()->User()->musicos->id;
        $users = $this->musician->find($usu);
        $users->update($data);
        
        // EMAIL
        $usuari = Auth()->User()->id;
        $email = $this->user->find($usuari);
        $email->update($data);

        //GENERO
        $users->generos()->sync($request['genero']);

        //IMAGEM
        if($request->file('pic') == null)
        {
            $users->foto = $users->foto;
        }
        else{
           
            Storage::deleteDirectory('perfil/'. $usuari);
            $users->foto = $request->file('pic')->getClientOriginalName(); 
            $request->file('pic')->storeAs('perfil/'. $usuari, $users->foto);
            $users->update();
        }



	    flash('Dados Atualizados com Sucesso!')->success();
	    return redirect()->route('perfil');
    }


    public function updateSenha(Request $request, User $usuario)
    {
        $regras = [
            'old_password' => "required",
            'password' => "required|min:6|max:18",
            'repeat_password' => "required|min:6|max:18"
        ];

        $mensagens = [
            'required' => "O campo é obrigatório.",
            'min' => "Minímo são 6 caracteres.",
            'max' => "Máximo são 18 caracteres."
        ];

        $request->validate($regras, $mensagens);
        $usuario = Auth()->User();
       
            
        //$usuario = $admin->password;
        

        if (password_verify($request->input('old_password'), $usuario->password))
        {

            if ($request->input('password') == $request->input('repeat_password')) {

                $usuario->password = bcrypt($request->input('password'));
                $usuario->save();

                $request->session()->flash('status', 'Senha alterada com sucesso!');
                $request->session()->flash('type', 'success');

                return redirect()->route('perfil');
            }else
            {
                $request->session()->flash('erro', 'As senhas não são iguais, tente novamente.');
                $request->session()->flash('type', 'warning');

                return redirect()->route('perfil');
            }
        } else
        {
            $request->session()->flash('erro', 'Sua senha atual, não confere!');
            $request->session()->flash('type', 'warning');
            return redirect()->route('perfil');
        }
    
    }

    public function search(Request $request)
    {   
        
        $search =  trim(strtoupper($request->input('search')));; 
        //$posts = DB::table('users')->where('instrumento', 'like', '%'.$search.'%')->paginate(5);  
        // $query = "SELECT u.name FROM users u JOIN instrumentos i ON u.id = i.id WHERE i.descricao LIKE '%{$search}%'";

        /* $query = "SELECT u.name FROM instrumentos i, users u, instrumento_user iu WHERE i.id = iu.instrumento_id AND u.id = iu.user_id AND i.descricao LIKE '%{$search}%'"; */

        $busca = DB::select("SELECT * FROM musicos WHERE nome LIKE '{$search}%'");
      

        return view('pesquisa', compact('busca'));
    }

    public function show()
    {   
        if(Auth()->User()->perfil == "Administrador")
        {
            return redirect()->back()->with('danger', 'Autenticação feita por administrador, favor utilizar o login do administrador');  
        
        }
        else{
            return view('user');  
        }
    }

    public function postar(PerfilRequest $request)
    {  
        
        $post = new Post();
        $post->usuario_id = Auth::id();
       
        $post->postagem = $request->postagem;
        $post->imagem = $request->file('imagem')->getClientOriginalName();
    
        
        $request->file('imagem')->storeAs(
            'postagem/' . Auth()->User()->id, $post->imagem);
        
            
        $post->save();
       
       
       
        
        
        return redirect()->route('home');

    }  

    public function destroy()
    {
        if (Auth::user()) {

            User::destroy(Auth::user()->id);

            flash('Seu perfil foi deletado com Sucesso!')->success();
            return redirect()->route('login');
        } else {
            return redirect()->route('login');
        }
    }
    
}

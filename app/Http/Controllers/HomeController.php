<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Genero;
use App\Http\Requests\PerfilRequest;
use App\Instrumento;
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
                                ->select('users.username', 'musicos.foto', 'musicos.user_id', 'federacaos.uf', 'musicos.nome')
                                ->orderBy('users.id', 'DESC')
                                ->paginate(3);
      

            $query = DB::select('SELECT u.username, u.perfil, m.user_id, m.foto, p.postagem, p.imagem, p.usuario_id, p.created_at FROM users u LEFT JOIN posts p on(u.id = p.usuario_id) INNER JOIN musicos m on(m.user_id = u.id) WHERE p.usuario_id = u.id AND p.status = 2 ORDER BY p.created_at DESC');

         

            $admin = DB::table('users')
                         ->join('posts', 'users.id', '=', 'posts.usuario_id')
                         ->select('posts.postagem')
                         ->where('users.perfil' , '=' , 'Administrador')
                         ->orderBy('posts.postagem', 'ASC')
                         ->paginate(1);
                        
                         
          
            /*$postagens = $postagens->get(); */
            return view('home', compact('usuarios', 'users', 'query', 'admin'));
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

        $musicos = DB::select("SELECT * FROM musicos WHERE nome LIKE '{$search}%'");
        $instrumentos = DB::select("SELECT IM.musico_id AS idMusico, I.descricao FROM Instrumentos I 
        INNER JOIN instrumentos_musicos IM ON (I.id=inst_id) 
        INNER JOIN Musicos M ON(IM.musico_id=M.id) WHERE nome LIKE '{$search}%'");


        $generos = DB::select("SELECT GM.musico_id as idMusico, G.descricao  FROM Generos G INNER JOIN generos_musicos GM ON (G.id=GM.genero_id) INNER JOIN Musicos M ON (GM.musico_id=M.id)  WHERE nome LIKE '{$search}%'");
        $musicoList = array();
        //$instrumentos = [];
     
        foreach($musicos as $key => $musico){
            
            $obj = array();
            $obj = (object) $obj;
            $obj->id = $musico->id;
            $obj->user_id = $musico->user_id;
            $obj->fed_id = $musico->fed_id;
            $obj->cidade = $musico->cidade;
            $obj->nome = $musico->nome;
            $obj->foto = $musico->foto;
            $obj->biografia = $musico->biografia;
            $obj->sexo = $musico->sexo;
            $obj->instrumentos = array();
            $obj->generos = array();
            foreach( $instrumentos as $y => $inst){
               if($musico->id == $inst->idMusico){
              
                $obj->instrumentos[$y] = $inst->descricao;
               }
            }
            foreach($generos as $x => $gen){
                if($musico->id == $gen->idMusico){
                    $obj->generos[$x] = $gen->descricao;
                }
            }
            $musicoList[$key] = $obj;
        }
        //dd($musicoList);

        return view('pesquisa', compact('musicoList'));

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
        $post->status = 1;
        $post->imagem = $request->file('imagem')->getClientOriginalName();
    
        
        $request->file('imagem')->storeAs(
            'postagem/' . Auth()->User()->id, $post->imagem);
        
            
        $post->save();
       
       
       
        
        flash('Postagem enviada para a aprovação!')->success();
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

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;

     public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->User()->perfil == "Administrador")
        {
            $usuarios = DB::table('users')->where('perfil', 'comum')->paginate(10);
            return view('admin.usuarios.index', compact('usuarios'));
        }
        else{
            return redirect()->route('home');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.login');
    }

    public function update(Request $request)
    {
        $data = $request->all();

	    $user = $this->user->find(auth()->user()->id);
	    $user->update($data);
   
        $user = auth()->user();
        $data['image'] = $user->image;
        if($request->hash_file('image') && $request->file('image')->isValid){
            if($user->image)
                $name = $user->image;
            else
                $name = $user->id.Kebab_case($user->name);

                $extenstion = $request->image->extension();
                $nameFile = "{$name}.{$extenstion}";
                $data['image'] = $nameFile;
                $upload = $request->image->storeAS('users',$nameFile);


                if(!$upload){
                    return redirect()->back()->with('error', 'Falha ao fazer upload da imagem');
                }


        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($usuario)
    {
        $usuarios = $this->user->find($usuario);
	    $usuarios->delete();

	    flash('Usuario Removida com Sucesso!')->success();
	    return redirect()->route('admin.usuarios.index');
    }

    public function senhaAdmin(Request $request)
    {
        if(Auth()->User()->perfil == "Administrador")
        {
            return view('admin.senha');
        }
        else{
            return redirect()->route('home');
        }
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

                return redirect()->route('admin.senha');
            }else
            {
                $request->session()->flash('status', 'As senhas não são iguais, tente novamente.');
                $request->session()->flash('type', 'warning');

                return redirect()->route('admin.senha');
            }
        } else
        {
            $request->session()->flash('status', 'Sua senha atual, não confere!');
            $request->session()->flash('type', 'warning');
            return redirect()->route('admin.senha');
        }
    
    }

    public function adicionarAdmin(Request $request)
    {
        if(Auth()->User()->perfil == "Administrador")
        {
            return view('admin.add');
        }
        else{
            return redirect()->route('home');
        }
       
    }

    public function addAdmin(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->perfil = $request->perfil;
        $user->save();
        $request->session()->flash('status', 'Administrador adicionado com sucesso!');
        return redirect()->route('admin.adicionar');
    }
}

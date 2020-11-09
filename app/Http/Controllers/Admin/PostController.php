<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    private $post;

     public function __construct(Post $post)
    {
        $this->post = $post;
    }


    public function index()
    {
        if(Auth()->User()->perfil == "Administrador")
        {
           
            $postagem = DB::table('users')
                            ->join('posts', 'users.id', '=', 'posts.usuario_id')
                                ->select('users.username', 'posts.postagem', 'posts.usuario_id', 'posts.imagem', 'posts.id')->where('users.perfil', '=', 'Comum')
                                ->orderBy('posts.postagem', 'DESC')
                                ->paginate(10);
            
            return view('admin.posts.index', compact('postagem'));
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $usuarios = $this->post->find($post);
	    $usuarios->delete();

	    flash('Postagem do usuario Removida com Sucesso!')->success();
	    return redirect()->route('admin.posts.index');
    }
}

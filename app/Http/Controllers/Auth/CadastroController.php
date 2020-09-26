<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\http\Requests\CadastroRequest;


use App\Musico;
use App\Genero_Musical;
use App\Instrumento;
use App\Federacao;

class CadastroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cadastro()
    {
        $federacao = Federacao::all();
        $instrumentos = Instrumento::all();
        $generos = Genero_Musical::all();
        return view('auth.store', compact('instrumentos', 'generos', 'federacao'));
    }

    public function store(CadastroRequest $request)
    {
        $usuario = new Musico();
            $usuario->user_id = auth()->user()->id;
            $usuario->fed_id = $request['federacao'];
            $usuario->nome = $request->nome;
            $usuario->sexo = $request->sexo;
            $usuario->telefone = $request->telefone;
            $usuario->biografia = $request->biografia;
            $usuario->save();
   
        $usuario->generos()->attach($request['genero']);
        $usuario->instrumentos()->attach($request['instrumento']);
    }
}

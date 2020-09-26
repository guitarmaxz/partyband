<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CadastroRequest;
use App\Musico;
use App\Genero;
use App\Instrumento;
use App\Federacao;


class CadastroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $federacao = Federacao::all();
        $instrumentos = Instrumento::all();
        $generos = Genero::all();
        return view('auth.store', compact('instrumentos', 'generos', 'federacao'));
    }

    public function store(CadastroRequest $request)
    {
        $usuario = new Musico();
            $usuario->user_id = auth()->user()->id;
            $usuario->fed_id = $request['federacao'];
            $usuario->nome = $request->nome;
            $usuario->sexo = $request->sexo;
            $usuario->telefone = trim(str_replace('(', '', str_replace(')', '', str_replace(' ', '', str_replace('-', '', $request->telefone)))));
            $usuario->biografia = $request->biografia;
            $usuario->save();
   
        $usuario->generos()->attach($request['genero']);
        $usuario->instrumentos()->attach($request['instrumento']);
        return redirect()->route('home');
    }
}

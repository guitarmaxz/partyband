<?php

namespace App\Http\Controllers\Admin;

use App\Genero;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    private $gen;

     public function __construct(Genero $gen)
    {
        $this->gen = $gen;
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
            $generos = $this->gen->paginate(10);
           return view('admin.generos.index', compact('generos'));
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
        if(Auth()->User()->perfil == "Administrador")
        {
            return view('admin.generos.create');
        }
        else{
            return redirect()->route('home');
        }
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

	    $generos = $this->gen->create($data);

	    flash('Genero Criado com Sucesso!')->success();
	    return redirect()->route('admin.generos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit($genero)
    {
        if(Auth()->User()->perfil == "Administrador")
        {
            $generos = $this->gen->findOrFail($genero);
            return view('admin.generos.edit', compact('generos'));  
        }
        else{
            return redirect()->route('home');
        }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $genero)
    {
        $data = $request->all();
	    $generos = $this->gen->find($genero);
	    $generos->update($data);

	    flash('Genero Atualizada com Sucesso!')->success();
	    return redirect()->route('admin.generos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy($genero)
    {
        $generos = $this->gen->find($genero);
	    $generos->delete();

	    flash('Genero Removida com Sucesso!')->success();
	    return redirect()->route('admin.generos.index');
    }
 
}

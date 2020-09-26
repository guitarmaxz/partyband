<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\instrumento;
use App\Http\Requests\InstrumentoRequest;

class InstrumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $inst;

     public function __construct(Instrumento $inst)
    {
        $this->inst = $inst;
    }

    public function index()
    {
        if(Auth()->User()->perfil == "Administrador")
        {
            $instrumentos = $this->inst->paginate(10);
            return view('admin.instrumentos.index', compact('instrumentos'));
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
            return view('admin.instrumentos.create');
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
    public function store(InstrumentoRequest $request)
    {
        $data = $request->all();

	    $instrumentos = $this->inst->create($data);

	    flash('Instrumento Criado com Sucesso!')->success();
	    return redirect()->route('admin.instrumentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\instrumento  $instrumento
     * @return \Illuminate\Http\Response
     */
    public function show($instrumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\instrumento  $instrumento
     * @return \Illuminate\Http\Response
     */
    public function edit($instrumento)
    {
        if(Auth()->User()->perfil == "Administrador")
        {
            $instrumentos = $this->inst->findOrFail($instrumento);
             return view('admin.instrumentos.edit', compact('instrumentos')); 
        }
        else{
            return redirect()->route('home');
        }
           
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\instrumento  $instrumento
     * @return \Illuminate\Http\Response
     */
    public function update(InstrumentoRequest $request, $instrumento)
    {
        $data = $request->all();

	    $instrumentos = $this->inst->find($instrumento);
	    $instrumentos->update($data);

	    flash('Instrumento Atualizado com Sucesso!')->success();
	    return redirect()->route('admin.instrumentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\instrumento  $instrumento
     * @return \Illuminate\Http\Response
     */
    public function destroy($instrumento)
    {
        $instrumentos = $this->inst->find($instrumento);
	    $instrumentos->delete();

	    flash('Instrumento Removida com Sucesso!')->success();
        return redirect()->route('admin.instrumentos.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Banda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BandaController extends Controller
{
    private $banda;

     public function __construct(Banda $banda)
    {
        $this->banda = $banda;
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
            $bandas = $this->banda->paginate(10);
            return view('admin.bandas.index', compact('bandas'));
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
     * @param  \App\Banda  $banda
     * @return \Illuminate\Http\Response
     */
    public function show(Banda $banda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banda  $banda
     * @return \Illuminate\Http\Response
     */
    public function edit(Banda $banda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banda  $banda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banda $banda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banda  $banda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banda $banda)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Coordenacao;
use Illuminate\Http\Request;

class CoordenacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coordenacoes = Coordenacao::paginate(10);
        return view('coordenacao.index',compact('coordenacoes'));
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
     * @param  \App\Coordenacao  $coordenacao
     * @return \Illuminate\Http\Response
     */
    public function show(Coordenacao $coordenacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coordenacao  $coordenacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Coordenacao $coordenacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coordenacao  $coordenacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coordenacao $coordenacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coordenacao  $coordenacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coordenacao $coordenacao)
    {
        //
    }
}

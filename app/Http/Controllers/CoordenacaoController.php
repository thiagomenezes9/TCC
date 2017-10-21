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
        return view('coordenacao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coordenacao = new Coordenacao();

        $coordenacao->nome = $request->nome;
        $coordenacao->sigla = $request->sigla;

        $coordenacao->ativo = 'N';



        $coordenacao->saveOrFail();


        return redirect('estados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coordenacao  $coordenacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coordenacao = Coordenacao::findOrFail($id);

        return view('coordenacao.show',compact('coordenacao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coordenacao  $coordenacao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coordenacao = Coordenacao::findOrFail($id);



        return view('coordenacao.edit',compact('coordenacao'));
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
    public function destroy($id)
    {
        $coordenacao = Coordenacao::findOrFail($id);

        $coordenacao->ativo = 'N';

        $coordenacao->save();


        //  Session::flash('mensagem', 'Contato deletado com sucesso!');

        return redirect('coordenacoes');
    }
}

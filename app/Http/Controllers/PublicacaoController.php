<?php

namespace App\Http\Controllers;

use App\Publicacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->membro->sigla == 'CCS'){
            $publicacoes = Publicacao::all()->where('ativo','=','1')->orderBy('created_at');
        }elseif(isset(Auth::user()->responsavel)){
//            $publicacoes = Publicacao::all()->where('');

            $publicacoes = DB::table('publicacaos')
                ->join('users', 'users.id', '=', 'publicacaos.user_id')
                ->join('coordenacaos', 'users.coordenacao_id', '=', 'coordenacaos.id')
                ->select('publicacaos.*')->where('ativo','=','1')
                ->get();


        }else{
            $publicacoes = Publicacao::all()->where([['user_id','=',Auth::user()->id],['ativo','=','1']]);
        }

        return view('publicacao.index',compact('publicacoes'));
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
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
    public function show(Publicacao $publicacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicacao $publicacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicacao $publicacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicacao $publicacao)
    {
        //
    }
}

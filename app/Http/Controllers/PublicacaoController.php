<?php

namespace App\Http\Controllers;

use App\Log;
use App\Publicacao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class PublicacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        $publicacoes = Publicacao::all();


        if(isset($user->membro)) {

            if ($user->membro->sigla == 'CCS') {
                $publicacoes = Publicacao::all()->where('ativo', '=', '1');
//                $publicacoes = Publicacao::all();
            } elseif (isset($user->responsavel)) {
//            $publicacoes = Publicacao::all()->where('');

                $publicacoes = DB::table('publicacaos')
                    ->join('users', 'users.id', '=', 'publicacaos.user_id')
                    ->join('coordenacaos', 'users.coordenacao_id', '=', 'coordenacaos.id')
                    ->select('publicacaos.*')->where('ativo', '=', '1')
//                    ->select('publicacaos.*')
                    ->get();


            } else {
                $publicacoes = Publicacao::all()->where([['user_id', '=', $user->id], ['ativo', '=', '1']]);
//                $publicacoes = Publicacao::all()->where('user_id', '=', $user->id);
            }

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
        return view('publicacao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $user = Auth::user();
        $publicacao = new Publicacao;



        $arquivo = Input::file('imagem');
        $form = $request->all();
        $form['imagem'] = (string) Image::make($arquivo)->encode('data-url');

       $publicacao->texto = $request->texto;
       $publicacao->titulo = $request->titulo;
       $publicacao->ativo = 1;
       $publicacao->publicado = 0;
       $publicacao->imagem = $form['imagem'];
       $publicacao->data_expiracao = $request->data_expiracao;
       $publicacao->user()->associate($user);


        $publicacao->save();


       $log = new Log;


       $log->publicacao()->associate($publicacao);
       $log->user()->associate($user);
       $log->desc = "Criou";



       $log->save();




       return redirect('publicacoes');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicacao = Publicacao::findOrFail($id);


        return view('publicacao.show',compact('publicacao'));
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

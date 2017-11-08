<?php

namespace App\Http\Controllers;

use App\Coordenacao;
use App\Log;
use App\Mail\EmailNotificacao;
use App\Publicacao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
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
//                $publicacoes = Publicacao::all()->where('ativo', '=', '1');
                $publicacoes = Publicacao::all();
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

        if($request->tipo == 'tv'){


            $publicacao->tipo = 'TV';

            $this->validate($request,[
                'titulo'=>'required',
                'data_expiracao' => 'required'

            ]);


        }else{

            $this->validate($request,[
                'texto'=>'required',
                'titulo' => 'required'

            ]);

            $publicacao->tipo = 'SITE';

        }


        if(isset($request->imagem)){

            $arquivo = Input::file('imagem');
            $form = $request->all();
            $form['imagem'] = (string) Image::make($arquivo)->encode('data-url');
            $publicacao->imagem = $form['imagem'];

        }else{
            $publicacao->texto = $request->texto;
        }





        $publicacao->titulo = $request->titulo;
        $publicacao->ativo = 1;
        $publicacao->publicado = 0;

        $publicacao->data_expiracao = $request->data_expiracao;
        $publicacao->user()->associate($user);


        $publicacao->save();



        $log = new Log;


        $log->publicacao()->associate($publicacao);
        $log->user()->associate($user);
        $log->desc = "Criou";



        $log->save();



        foreach (Coordenacao::find(1)->membros as $membro){
            Mail::to($membro)->send(new EmailNotificacao($publicacao->id));
        }


        $resp = $user->membro->responsavel;
        Mail::to($resp)->send(new EmailNotificacao($publicacao->id));




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




//        dd($publicacao);

        return view('publicacao.show',compact('publicacao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
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
    public function destroy($id)
    {


    }



    public function desativar($id){
        $publicacao = Publicacao::find($id);

        if($publicacao->publicado == 0){
            $publicacao->ativo = 0;
            $publicacao->save();


            $log = new Log;


            $log->publicacao()->associate($publicacao);
            $log->user()->associate(Auth::user());
            $log->desc = "Desativou";

            $log->save();


        }else{
            return redirect()->route('publivcacoes.show',$id)->with('fail','Publicação foi publicada não e possivel desativar!')->withInput();
        }

        return redirect('publicacoes');
    }



    public function publicar($id){
        $publicacao = Publicacao::find($id);

        $publicacao->publicado = 1;
        $publicacao->data_publicacao = Carbon::now();

        $publicacao->save();


        $log = new Log;


        $log->publicacao()->associate($publicacao);
        $log->user()->associate(Auth::user());
        $log->desc = "Publicou";

        $log->save();


        return redirect()->route('publicacoes.index')->with('success','Publicação foi publicada!')->withInput();


    }



    public function createTV()
    {
        return view('publicacao.createTv');
    }

    public function createSite()
    {
        return view('publicacao.createSite');
    }

}

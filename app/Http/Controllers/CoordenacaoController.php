<?php

namespace App\Http\Controllers;

use App\Coordenacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $coordenacoes = Coordenacao::all();
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
        $this->validate($request, [
            'nome' => 'required',
            'sigla' => 'required',
        ]);

        $coordenacao = new Coordenacao();

        $coordenacao->nome = $request->nome;
        $coordenacao->sigla = $request->sigla;

        $coordenacao->ativo = 1;



        $coordenacao->saveOrFail();


        return redirect('coordenacoes');
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
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'nome' => 'required',
            'sigla' => 'required',
        ]);


        $coordenacao = Coordenacao::findOrFail($id);

        $user = null;


        if(isset($request->responsavel)){
            $user = User::findOrFail($request->responsavel);
        }




        if($user!=null) {
            if ($coordenacao->responsavel != $user) {



                $userold = $coordenacao->responsavel;
                $userold->responsavel()->dissociate();
                $userold->save();


                $user->responsavel()->associate($coordenacao);
                $user->save();
            }
        }


        $aux = 0;

        foreach ($coordenacao->membros as $membro) {
            $aux = $aux + $membro->id;
        }




        if($request->ativo == '1'){

            $coordenacao->nome = $request->nome;
            $coordenacao->sigla = $request->sigla;
            $coordenacao->ativo = '1';


            $coordenacao->save();


        }elseif ($aux!=0){
//            echo "com membros";
//            return redirect()->back()->with('fail','Coordenação não pode ser desativada')->withInput();
            return redirect('coordenacoes')->with('fail','Coordenação com membros não pode ser desativada!')->withInput();
        }else{
//            echo "sem mebros";
            $coordenacao->ativo = '0';
            $coordenacao->save();

        }

        return redirect('coordenacoes');

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

        if($coordenacao->membros){
            Session::flash('mensagem', 'Contato deletado com sucesso!');
        }else{
            $coordenacao->ativo = 'N';

            $coordenacao->save();
            Session::flash('mensagem', 'Contato deletado com sucesso!');
        }







        return redirect('coordenacoes');
    }
}

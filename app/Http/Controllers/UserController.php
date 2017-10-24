<?php

namespace App\Http\Controllers;

use App\Coordenacao;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('user.index',compact('usuarios'));
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);

        return view('user.show',compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $coordenacao = Coordenacao::all()->where('ativo','1');




        return view('user.edit',compact('usuario','coordenacao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);


//        if($request->ativo == '1'){
//            Session::flash('mensagem', 'Coordenação desativado!');
//            $coordenacao->update($request->all());
//
//
//            $coordenacao->save();
//        }elseif ($coordenacao->membros){
//            Session::flash('mensagem', 'Coordenação com membros não e possivel desativar!');
//        }
//

        $user->name=$request->nome;
        $user->matricula=$request->matricula;
        $user->ativo=$request->ativo;

        if($request->coordenacao != $user->coordenacao_id){
            $coord = Coordenacao::findOrFail($request->coordenacao);


            $user->membro()->associate($coord);




        }

        $user->save();



        return redirect('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

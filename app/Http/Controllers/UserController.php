<?php

namespace App\Http\Controllers;

use App\Coordenacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

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


        if($request->perfil == 0){
            $this->validate($request, [
                'nome' => 'required',
                'matricula' => 'required',
            ]);

            $user = User::findOrFail($id);


            if(isset($request->imagem)) {

                $arquivo = Input::file('imagem');
                $form = $request->all();
                $form['imagem'] = (string)Image::make($arquivo)->resize(300,300)->encode('data-url');
                $user->avatar= $form['imagem'];
            }



            $user->name=$request->nome;
            $user->matricula=$request->matricula;
            $user->ativo=$request->ativo;

            if($request->coordenacao != $user->coordenacao_id){
                $coord = Coordenacao::findOrFail($request->coordenacao);


                $user->membro()->associate($coord);

            }


            if($user->resp_coord_id == NULL){
                $user->save();
            }elseif ($user->resp_coord_id != $request->coordenacao){

                return redirect('usuarios')->with('fail','Usuário Responsavel por coordenação não pode mudar de coordenação, escolha outro responsavel pela coordenação!')->withInput();
            }else{
                $user->save();
            }

            return redirect('usuarios');
        }

        $user = User::findOrFail($id);

        $arquivo = Input::file('imagem');
        $form = $request->all();
        $form['imagem'] = (string)Image::make($arquivo)->resize(300,300)->encode('data-url');
        $user->avatar= $form['imagem'];

        $user->name=$request->nome;
        $user->matricula=$request->matricula;

        $user->save();

        return redirect('dashboard');

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

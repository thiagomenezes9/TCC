@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Usuário
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Detalhes do Usuário
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detalhes do Usuário</h3>

                        <div align="right"><a href="{{route('usuarios.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Nome : {{$usuario->name}}</h2></strong></p>
                        <br>
                        <p><strong>Email : {{$usuario->email}}</strong></p><br>
                        <p><strong>Matricula : {{$usuario->matricula}}</strong></p><br>
                        <p><strong>Ativo : {{$usuario->ativo ? 'Sim' : 'Não'}}</strong></p><br>
                        <p><strong>Membro da Coordenação
                                : {{isset($usuario->membro->nome) ?  $usuario->membro->nome : '' }}
                                - {{isset($usuario->membro->sigla) ?  $usuario->membro->sigla : '' }}</strong></p><br>
                        @if(isset($usuario->responsavel->nome))
                            <p><strong>Responsavel da Coordenação
                                    : {{isset($usuario->responsavel->nome) ?  $usuario->responsavel->nome : '' }}</strong>
                            </p><br>
                        @endif



                        @if(isset($usuario->avatar))

                            <p><strong>Foto Perfil : </strong></p><br>
                            <img src="{{$usuario->avatar}}" width="100%" height="100%" id="imagem">
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
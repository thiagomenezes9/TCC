@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Publicação
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Publicação
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detalhes da Publicação</h3><br><br>

                        <div class="row">

                            <div align="left" class="col col-lg-2"><a href="{{route('publicacoes.index')}}" class="btn btn-info">Voltar</a></div>
                            <div align="right" class="col-12 col-md-auto">
                                @if(Auth::user()->membro->sigla == 'CCS')
                                     <a href="#" class="btn btn-info">Publicar</a>
                                @endif
                                @if(!$publicacao->publicado)
                                    @if($publicacao->user_id == Auth::user()->id)
                                       <a href="#" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i>Editar</a>
                                        <a href="#" class="btn btn-danger">Desativar</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Titulo : {{$publicacao->titulo}}</h2></strong></p><br>
                        <p><strong>Data Criação : </strong> {{$publicacao->created_at->format('d/m/Y')}}</p><br>
                        <p><strong>Data Final : </strong> {{$publicacao->data_expiracao}}</p><br>
                        <p><strong>Usuário : </strong> {{$publicacao->user->name}}</p><br>
                        <p><strong>Ativo : </strong> {{$publicacao->ativo ? 'Sim' : 'Não'}}</p><br>
                        <p><strong>Publicado : </strong> {{$publicacao->publicado ? 'Sim' : 'Não'}}</p><br>
                        @if($publicacao->publicado){
                            <p><strong>Data da Publicação : </strong> {{$publicacao->data_publicacao->format('d/m/Y')}}</p><br>
                        }@endif
                        <p><strong>Imagem : </strong></p><br>

                        <img src="{{$publicacao->imagem}}">

                        <br><br><p><strong>LOG</strong></p>


                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <td class="col-md-5"><strong>Usuário</strong></td>
                                <td align="center"><strong>Descrição</strong></td>
                                <td align="center"><strong>data</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($publicacao->log as $log)
                                <tr align="center">
                                    <td align="left">{{ $log->user->name}}</td>
                                    <td align="left">{{ $log->desc}}</td>
                                    <td align="left">{{ $log->created_at->format('d/m/Y')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>





                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
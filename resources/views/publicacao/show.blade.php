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
                        <h3 class="box-title">Detalhes da Publicação</h3>

                        <div align="right"><a href="{{route('publicacoes.index')}}" class="btn btn-info">Voltar</a></div>
                        @if(Auth::user()->membro->sigla == 'CCS'){
                             <div align="right"><a href="#" class="btn btn-info">Publicar</a></div>
                        }@endif
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Titulo : {{$publicacao->nome}}</h2></strong></p><br>
                        <p><strong>Data Criação : </strong> {{$publicacao->created_at->format('d/m/Y')}}</p><br>
                        <p><strong>Data Final : </strong> {{$publicacao->data_expiracao->format('d/m/Y')}}</p><br>
                        <p><strong>Usuário : </strong> {{$publicacao->user->name}}</p><br>
                        <p><strong>Ativo : </strong> {{$publicacao->ativo ? 'Sim' : 'Não'}}</p><br>
                        <p><strong>Publicado : </strong> {{$publicacao->publicado ? 'Sim' : 'Não'}}</p><br>
                        @if($publicacao->publicado){
                            <p><strong>Data da Publicação : </strong> {{$publicacao->data_publicacao->format('d/m/Y')}}</p><br>
                        }@endif
                        <p><strong>Imagem : </strong></p><br>

                        <img src="{{$publicacao->imagem}}">

                        <p><strong>LOG</strong></p>


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
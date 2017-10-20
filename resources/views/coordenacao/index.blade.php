@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Coordenação
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Lista das Coordenações
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Coordenação</h3>
                        <div align="right"><a href="#" class="btn btn-success">Novo</a></div>
                    </div>

                    <div class="box-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <td class="col-md-5"><strong>Nome</strong></td>
                                <td class="col-md-3"><strong>Sigla</strong></td>
                                <td class="col-md-3"><strong>Ativo</strong></td>
                                <td align="center"><strong>Ações</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($coordenacoes as $c)
                                <tr align="center">
                                    <td align="left">{{ $c->nome }}</td>
                                    <td align="left">{{ $c->sigla }}</td>
                                    <td align="left">{{$c->ativo}}</td>
                                    <td>
                                        <a class="btn btn-small btn-info" href="#" >
                                            <i class="fa fa-search-plus"></i>
                                            Detalhes
                                        </a>

                                        <a class="btn btn-small btn-warning" href="#" >
                                            <i class="fa fa-pencil-square-o"></i>
                                            Editar
                                        </a>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="text-center">
                            {!! $coordenacoes->links() !!}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
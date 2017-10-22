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
                        <div align="right"><a href="{{route('coordenacoes.create')}}" class="btn btn-success">Novo</a></div>
                    </div>

                    <div class="box-body">

                        <table class="table table-bordered table-striped" id="tabCoordenacoes">
                            <thead>
                            <tr>
                                <td class="col-md-5"><strong>Nome</strong></td>
                                <td class="col-md-2"><strong>Sigla</strong></td>
                                <td class="col-md-2"><strong>Ativo</strong></td>
                                <td class="col-mb-4" align="center"><strong>Ações</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($coordenacoes as $c)
                                <tr align="center">
                                    <td align="left">{{ $c->nome }}</td>
                                    <td align="left">{{ $c->sigla }}</td>
                                    <td align="left">{{$c->ativo ? 'Sim' : 'Não'}}</td>
                                    <td>
                                        <a class="btn btn-small btn-info" href="{{route('coordenacoes.show',$c->id)}}" >
                                            <i class="fa fa-search-plus"></i>
                                            Detalhes
                                        </a>

                                        <a class="btn btn-small btn-warning" href="{{route('coordenacoes.edit',$c->id)}}" >
                                            <i class="fa fa-pencil-square-o"></i>
                                            Editar
                                        </a>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{--<div class="text-center">--}}
                            {{--{!! $coordenacoes->links() !!}--}}
                        {{--</div>--}}


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection




@section('scriptlocal')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabCoordenacoes').DataTable( {
                "language": {
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Próxima"
                    },
                    "sSearch": "<span>Pesquisar</span> _INPUT_", //search
                    "lengthMenu": "Exibir _MENU_ registros por página",
                    "zeroRecords": "Não há resultados para esta busca",
                    "info": "Exibindo página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(Filtrado de _MAX_ registros)"

                }
            } );
        })
    </script>
@endsection
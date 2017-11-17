@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Publicações
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Lista das Publicações
@stop


@section('main-content')


    @if (Session::get('fail'))
        <div class="box alert alert-danger">
            <div class="box-header with-border">
                <h3 class="box-title text-gray">Atenção</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool"
                            data-widget="remove" data-toggle="tooltip" title="Fechar">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            </div>
        </div>
    @endif

    @if (Session::get('success'))
        <div class="box success alert-success">
            <div class="box-header with-border">
                <h3 class="box-title text-gray">Sucesso</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool"
                            data-widget="remove" data-toggle="tooltip" title="Fechar">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="alert alert-seccess">{{ Session::get('success') }}</div>
            </div>
        </div>
    @endif





    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                       {{--<strong><h3 class="box-title">Publicações</h3></strong>--}}


                        <div class="dropdown">
                            <button class="dropbtn">Nova...</button>
                            <div class="dropdown-content">
                                <a href="{{route('PublicacaoCreateTV')}}" class="btn btn-success">Publicação TV</a>
                                <a href="{{route('PublicacaoCreateSite')}}" class="btn btn-success">Publicação Site</a>
                            </div>
                        </div>


                    </div>

                    <div class="box-body">


                        <strong><h3>Publicações Não Publicadas</h3></strong>

                        <table class="table table-bordered table-striped" id="tabPublicacao">
                            <thead>
                            <tr>
                                <td class="col-md-4"><strong>Titulo</strong></td>
                                <td class="col-md-2"><strong>Destino</strong></td>
                                <td class="col-md-2"><strong>Criador</strong></td>
                                <td class="col-md-2"><strong>Ativa</strong></td>
                                <td class="col-md-2"><strong>Data Criação</strong></td>
                                <td class="col-mb-4" align="center"><strong>Ações</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($publicacoes as $p)

                                @if($p->publicado == 0)

                                <tr align="center">
                                    <td align="left">{{ $p->titulo }}</td>
                                    <td align="left">{{ $p->tipo }}</td>
                                    <td align="left">{{ $p->user->name }}</td>
                                    <td align="left">{{$p->ativo ? 'Sim' : 'Não'}}</td>
                                    <td align="left">{{$p->created_at->format('d/m/Y')}}</td>
                                    <td>
                                        <a class="btn btn-small btn-info" href="{{route('publicacoes.show',$p->id)}}" >
                                            <i class="fa fa-search-plus"></i>
                                            Detalhes
                                        </a>

                                    </td>
                                </tr>

                                @endif
                            @endforeach
                            </tbody>
                        </table>



                        <br>

                        <strong><h3>Publicações Publicadas</h3></strong>

                        <br>


                        <table class="table table-bordered table-striped" id="tabPublicado">
                            <thead>
                            <tr>
                                <td class="col-md-4"><strong>Titulo</strong></td>
                                <td class="col-md-2"><strong>Destino</strong></td>
                                <td class="col-md-2"><strong>Criador</strong></td>
                                <td class="col-md-2"><strong>Ativa</strong></td>
                                <td class="col-md-2"><strong>Data Criação</strong></td>
                                <td class="col-mb-4" align="center"><strong>Ações</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($publicacoes as $p)

                                @if($p->publicado == 1)

                                    <tr align="center">
                                        <td align="left">{{ $p->titulo }}</td>
                                        <td align="left">{{ $p->tipo }}</td>
                                        <td align="left">{{ $p->user->name }}</td>
                                        <td align="left">{{$p->ativo ? 'Sim' : 'Não'}}</td>
                                        <td align="left">{{$p->created_at->format('d/m/Y')}}</td>
                                        <td>
                                            <a class="btn btn-small btn-info" href="{{route('publicacoes.show',$p->id)}}" >
                                                <i class="fa fa-search-plus"></i>
                                                Detalhes
                                            </a>

                                        </td>
                                    </tr>

                                @endif
                            @endforeach
                            </tbody>
                        </table>








                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection




@section('scriptlocal')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabPublicacao').DataTable( {
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

            $('#tabPublicado').DataTable( {
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


    <style>
        /* Style The Dropdown Button */
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        /*.dropdown-content a:hover {background-color: #f1f1f1}*/

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>








@endsection
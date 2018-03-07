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



    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detalhes da Publicação</h3><br><br>

                        <div class="row">

                            <div align="left" class="col col-lg-2"><a href="{{route('publicacoes.index')}}" class="btn btn-info">Voltar</a></div>
                            <div align="right" class="col-12 col-md-auto">
                                @if(Auth::user()->membro->sigla == 'CCS' && $publicacao->publicado==0 && $publicacao->ativo)
                                     <a href="{{route('PublicacaoPublicar',$publicacao->id)}}" class="btn btn-success">Publicar</a>
                                @endif
                                @if(!$publicacao->publicado && $publicacao->ativo)
                                    @if(($publicacao->user_id == Auth::user()->id) || Auth::user()->membro->sigla == 'CCS' )
                                       <a href="{{route('publicacoes.edit',$publicacao->id)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i>Editar</a>

                                        {{--<a href="{{route('PublicacaoDesativar',$publicacao->id)}}" class="btn btn-danger">Desativar</a>--}}

                                            <a class="btn btn-small btn-danger" data-toggle="modal" href="#myModal" >
                                                <i class="fa fa-trash-o"></i>
                                                Excluir
                                            </a>


                                    @endif
                                @endif
                            </div>

                            <div class="modal fade modal-danger" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Excluir</h4>
                                        </div>

                                        <div class="modal-body text-center">
                                            <p>Realmente Deseja Desativar a publicação ??</p>
                                        </div>

                                        <div class="modal-footer">

                                            <form id="formDelete"
                                                  action="{{route('PublicacaoDesativar',$publicacao->id)}}"
                                                  method="post">

                                                {{ csrf_field() }}

                                                {{--<div class="form-group">--}}
                                                    {{--<label for="titulo" class="col-sm-2 control-label" >Motivo</label>--}}
                                                    <div class="col-sm-12">
                                                        <input name="motivo"  type="text" class="form-control input-lg"
                                                               id="motivo" placeholder="Motivo de desativar" autofocus>
                                                    </div>
                                                {{--</div>--}}

                                                <button class="btn btn-danger" type="submit">Excluir</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>


                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>





                        </div>
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Titulo : {{$publicacao->titulo}}</h2></strong></p><br>
                        <p><strong>Destinado : </strong> {{$publicacao->tipo}}</p><br>
                        <p><strong>Data Criação : </strong> {{$publicacao->created_at->format('d/m/Y')}}</p><br>
                        <p><strong>Data Final : </strong> {{\Carbon\Carbon::parse($publicacao->data_expiracao)->format('d/m/Y')}}</p><br>
                        <p><strong>Usuário : </strong> {{$publicacao->user->name}}</p><br>

                        <p><strong>Ativo : </strong> {{$publicacao->ativo ? 'Sim' : 'Não'}}</p><br>
                        <p><strong>Publicado : </strong> {{$publicacao->publicado ? 'Sim' : 'Não'}}</p><br>
                        @if($publicacao->publicado)
                            <p><strong>Data da Publicação : </strong> {{\Carbon\Carbon::parse($publicacao->data_publicacao)->format('d/m/Y')}}</p><br>
                        @endif
                        @if(isset($publicacao->imagem))

                            <p><strong>Imagem : </strong></p><br>

                            <img src="{{$publicacao->imagem}}" width="100%" height="100%" id="imagem">



                         @else

                            <p><strong>Texto da Publicação : </strong> {{$publicacao->texto}}</p>

                        @endif
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

@section('scriptlocal')

    <script type="text/javascript">
        $(document).ready(function () {

            $("#imagem").bind('mouseover', function () {

                $(this).animate({height: "140%", width: "140%"});

            })
            $("#imagem").bind('mouseout', function () {

                $(this).animate({height: "100%", width: "100%"});

            })
        })
    </script>

@endsection
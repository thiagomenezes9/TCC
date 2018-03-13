@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Publicação
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Nova Publicação
@stop


@section('main-content')

    @if($errors->any())
        <div class="box alert alert-danger">
            <div class="box-header with-border">
                <h3 class="box-title text-gray">Opss! Alguma coisa errada</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool"
                            data-widget="remove" data-toggle="tooltip" title="Fechar">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    @endif



    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nova Publicação - SITE</h3>
                        <div align="right"><a href="{{route('publicacoes.index')}}" class="btn btn-info">Voltar</a></div>
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{route('publicacoes.store')}}" method="post" enctype="multipart/form-data">

                            <!-- 'nome', 'sigla',
                                'ativo' -->

                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                            <input type="hidden" name="tipo" value="site"/>




                            <div class="form-group">
                                <label for="titulo" class="col-sm-2 control-label" >Titulo</label>
                                <div class="col-sm-10">
                                    <input name="titulo" value="{{ old('titulo') }}" type="text" class="form-control input-lg"
                                           id="titulo" placeholder="Titulo da publicação" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="texto" class="col-sm-2 control-label" >Texto</label>
                                {{--<div class="col-sm-10">--}}
                                    {{--<textarea name="texto" value="{{ old('texto') }}" type="text" class="form-control input-lg"--}}
                                              {{--id="texto" placeholder="Texto da publicação" autofocus ></textarea>--}}

                                    {{----}}


                                {{--</div>--}}
                            </div>


                            <textarea id="summernote" name="texto"></textarea>





                            {{--<div class="form-group">--}}
                                {{--<label for="inputDataNasc" class="col-sm-2 control-label">Data Expiração</label>--}}
                                {{--<div class="col-sm-10">--}}
                                    {{--<input type="date" class="form-control input-lg" id="data_expiracao" name="data_expiracao"--}}
                                           {{--value="{{old('data_expiracao')}}" placeholder="Data de Expiração">--}}
                                {{--</div>--}}
                            {{--</div>--}}


                            {{--<div class="form-group">--}}
                                {{--<label for="imagem" class="col-sm-2 control-label">Imagem</label>--}}
                                {{--<input name="imagem" type="file" class="form-control-file"--}}
                                       {{--id="imagem" autofocus>--}}
                            {{--</div>--}}



                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right btn-lg">
                                    Salvar</button>

                            </div>



                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection

@section('scriptlocal')

    <!-- include libraries(jQuery, bootstrap) -->
    {{--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">--}}
    {{--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>--}}
    {{--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>--}}

    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>


    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">--}}
    {{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>--}}


    <script type="text/javascript">


        $(document).ready(function() {
            $('#summernote').summernote({
                // placeholder: 'Hello stand alone ui',
                //tabsize: 2,
                // height: 100,
                // lang: 'pt-br',
                 height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true
            });

        });

    </script>




        {{--function minhaNotificao() {--}}
            {{--if (Notification.permission !== "granted") {--}}
                {{--Notification.requestPermission();--}}
            {{--}--}}
            {{--else {--}}
                {{--var notificacao = new Notification("IFG News", {--}}
                    {{--icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',--}}
                    {{--body: 'Nova publicação'--}}
                {{--});--}}

                {{--notificacao.onclick = function () {--}}
                    {{--window.open('http://tcc.paetto.com.br');--}}
                {{--};--}}

                {{--notificacao.show();--}}
            {{--}--}}

        {{--}--}}

        {{--minhaNotificacao();--}}

    {{--</script>--}}

    @endsection


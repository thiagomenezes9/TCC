@extends('adminlte::layouts.app')



@section('htmlheader_title')
    Publicações
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Editando Publicação
@stop


@section('main-content')

    {{--@if(\Illuminate\Support\Facades\Session::has('mensagem'))--}}
    {{--<div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('mensagem')}}</div>--}}
    {{--@endif--}}

    @if (Session::get('fail'))
        <div class="alert alert-info">{{ Session::get('fail') }}</div>
    @endif

    {{--@if(Session::get('fail'))--}}
    {{--{{Session::get('fail')}}--}}
    {{--@endif--}}


    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif


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
                        <h3 class="box-title">Edição da Publicação</h3>
                        <div align="right"><a href="{{route('publicacoes.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{route('publicacoes.update',$publicacao->id)}}" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_method" value="PUT">

                            {{csrf_field()}}



                            <input type="hidden" name="tipo" value="tv"/>




                            <div class="form-group">

                                <label for="titulo" class="col-sm-2 control-label" >Escolha </label>
                                <div class="col-sm-10">

                                    <div class="noticia-checkbox-personalizado">
                                        <div class="cadastro">
                                            <input type="radio" value="1" checked name="tipo-cadastro" id="tipo-cadastro1">
                                            <label for="tipo-cadastro1">Imagem</label>
                                            <input type="radio" value="2" name="tipo-cadastro" id="tipo-cadastro2">
                                            <label for="tipo-cadastro2">Texto</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{--</div>--}}

                            <div class="form-group">
                                <label for="titulo" class="col-sm-2 control-label" >Titulo</label>
                                <div class="col-sm-10">
                                    <input name="titulo" value="{{ $publicacao->titulo }}" type="text" class="form-control input-lg"
                                           id="titulo" placeholder="Titulo da publicação" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="texto" class="col-sm-2 control-label" >Texto</label>
                                <div class="col-sm-10">
                                    <textarea name="texto" value="{{ $publicacao->texto }}" type="text" class="form-control input-lg"
                                              id="texto" placeholder="{{$publicacao->texto}}" autofocus ></textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputDataNasc" class="col-sm-2 control-label">Data Expiração</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control input-lg" id="data_expiracao" name="data_expiracao"
                                           value="{{$publicacao->data_expiracao}}" >
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="imagem" class="col-sm-2 control-label">Imagem</label>
                                <input name="imagem" type="file" class="form-control-file"
                                       id="imagem" autofocus>
                            </div>



                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right btn-lg">
                                    Save</button>

                            </div>



                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('scriptlocal')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#tipo-cadastro2').click(function () {

                $('#texto').removeAttr('disabled');
//                $('#imagem').removeAttr('enable');
                //$('#imagem').setAttribute('disabled','true');
                $('#imagem').prop("disabled", true);



            });

            $('#tipo-cadastro1').click(function () {

                $('#imagem').removeAttr('disabled');
//                $('#imagem').removeAttr('enable');

                $('#texto').prop("disabled", true);

            });



        })
    </script>






    <style type="text/css">


        /*.noticia-checkbox-personalizado code{background:#fff; font-size:11; color:#333; border:1px solid #ccc; padding:10px; float:left; margin:21px 0 10px; width:100%; border-radius:4px; box-sizing:border-box; -webkit-box-sizing:border-box;}*/
        /*.noticia-checkbox-personalizado b{display:block; width:100%; padding:0 0 7px}*/
        /*.noticia-checkbox-personalizado h3{font-size:24px; padding:16px 0 8px; clear:both;}*/
        /*.noticia-checkbox-personalizado h4{font-size:23px; padding:10px 0 9px; color:#507701; clear:both}*/
        /*.noticia-checkbox-personalizado h5{font-size:17px; padding:15px 0 4px; margin:0 0 8px; color:#CC5200; font-weight:normal; line-height:normal; font-family:fonte; border-bottom:1px dotted #CC5200}*/
        /*.noticia-checkbox-personalizado .exemplo1, .noticia-checkbox-personalizado .exemplo2{margin:0 0 14px; display:block; float:none; background:none; border-radius:4px; padding:5px; border:none; width:auto; opacity:1; clear:both; height:auto}*/
        /*.noticia-checkbox-personalizado .exemplo1:hover, .noticia-checkbox-personalizado .exemplo2:hover{height:auto !important; transform:none; -webkit-transform:none}*/
        .noticia-checkbox-personalizado .cadastro{width:400px; float:left;}
        .noticia-checkbox-personalizado .cadastro input[type=radio]{display:none;}
        .noticia-checkbox-personalizado .cadastro input[type=radio]+label {
            font-family:Verdana, Geneva, sans-serif;
            font-weight:bold;
            float:left;
            display:inline-block;
            width:50%;
            margin:-2px;
            padding:4px 0;
            margin-bottom:0;
            font-size:13px;
            height:34px;
            line-height:28px;
            color:#fff;
            text-align:center;
            vertical-align:middle;
            cursor:pointer;
            background-color:#D8AB39;
            background-image:-moz-linear-gradient(top,#D8AB39,#D3A529);
            background-image:-webkit-gradient(linear,0 0,0 100%,from(#D8AB39),to(#D3A529));
            background-image:-webkit-linear-gradient(top,#D8AB39,#D3A529);
            background-image:-o-linear-gradient(top,#D8AB39,#D3A529);
            background-image:linear-gradient(to bottom,#D8AB39,#D3A529);
            background-repeat:repeat-x;
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#D8AB39',endColorstr='#D3A529',GradientType=0);
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            border:none;
            border-right:1px solid #B48C25;
            border-bottom:1px solid #B48C25;
            border-radius:3px;
            -webkit-box-shadow:inset 0 1px 0 rgba(0,0,0,0.2),0 1px 2px rgba(0,0,0,0.05);
            -moz-box-shadow:inset 0 1px 0 rgba(0,0,0,0.2),0 1px 2px rgba(0,0,0,0.05);
            box-shadow:inset 0 1px 0 rgba(0,0,0,0.2),0 1px 2px rgba(0,0,0,0.05);
            text-shadow:0 1px 1px rgba(0,0,0,0.75);
            box-sizing:border-box;
            -webkit-box-sizing:border-box;
        }
        .noticia-checkbox-personalizado .cadastro input[type=radio]:checked + label {background-image: none; outline:0; -webkit-box-shadow:inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05); 	-moz-box-shadow:inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05); box-shadow:inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05); background-color:green; border-right:1px solid #B48C25;}



    </style>




@endsection
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



                            <input type="hidden" name="tipo" value="site"/>




                            <div class="form-group">
                                <label for="titulo" class="col-sm-2 control-label" >Titulo</label>
                                <div class="col-sm-10">
                                    <input name="titulo" value="{{$publicacao->titulo}}" type="text" class="form-control input-lg"
                                           id="titulo" placeholder="Titulo da publicação" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="texto" class="col-sm-2 control-label" >Texto</label>
                                <div class="col-sm-10">
                                    <textarea name="texto" value="{{ $publicacao->texto }}" type="text" class="form-control input-lg"
                                              id="texto" placeholder="{{ $publicacao->texto }}" autofocus ></textarea>
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


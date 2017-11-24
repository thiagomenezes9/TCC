@extends('adminlte::layouts.app')

@section('htmlheader_title')
Usuário
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
Perfil do Usuario
@stop


@section('main-content')

{{--@if(\Illuminate\Support\Facades\Session::has('mensagem'))--}}
{{--<div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('mensagem')}}</div>--}}
{{--@endif--}}


@if (Session::has('mensagem'))
<div class="alert alert-info">{{ Session::get('mensagem') }}</div>
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
                    <h3 class="box-title">Perfil do Usuário</h3>
                    {{--<div align="right"><a href="{{route('dashboard')}}" class="btn btn-info">Voltar</a></div>--}}
                    {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                </div>

                <div class="box-body">

                    <form class="form-horizontal" action="{{route('usuarios.update',$usuario->id)}}" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="_method" value="PUT">


                        {{csrf_field()}}


                        <h2>{{$usuario->name}} Profile</h2>



                        <input type="hidden" value="1" name="perfil" id="perfil" >


                        <div class="form-group">
                            <label for="nome" class="col-sm-2 control-label" >Nome</label>
                            <div class="col-sm-10">
                                <input name="nome" value="{{ $usuario->name }}" type="text" class="form-control input-lg"
                                       id="nome" placeholder="Nome do Usuário" autofocus>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="sigla" class="col-sm-2 control-label" >Matricula</label>
                            <div class="col-sm-10">
                                <input name="matricula" value="{{$usuario->matricula}}" type="text" class="form-control input-lg"
                                       id="matricula" placeholder="Matricula do Usuário" autofocus>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="imagem" class="col-sm-2 control-label">Upload Imagem</label>
                            <input name="imagem" type="file" class="form-control-file"
                                   id="imagem" autofocus>
                        </div>




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
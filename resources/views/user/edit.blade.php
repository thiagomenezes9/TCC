@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Usuário
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Editando Usuário
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
                        <h3 class="box-title">Edição do Usuário</h3>
                        <div align="right"><a href="{{route('usuarios.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{route('usuarios.update',$usuario->id)}}" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_method" value="PUT">


                            {{csrf_field()}}

                            <input type="hidden" value="0" name="perfil" id="perfil">



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


                            {{--Ativo, Resp--}}



                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="ativo" id="ativo" class="form-control">
                                        <option value="1" {{$usuario->ativo == '1' ? "selected" : ""}}>Ativado</option>
                                        <option value="0" {{$usuario->ativo == '0' ? "selected" : ""}}>Desativado</option>

                                    </select>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="responsavel" class="col-sm-2 control-label">Coordenação</label>
                                <div class="col-sm-10">
                                    <select name="coordenacao" id="coordenacao" class="form-control">

                                        @foreach($coordenacao as $c)
{{--                                            <option value="{{$c->id}}" {{ $membro['id'] === (isset($coordenacao->responsavel) ? $coordenacao->responsavel: '' ) ? 'selected' : '' }}>{{$membro['name']}}</option>--}}
                                            <option value="{{$c->id}}" {{ $usuario->coordenacao_id === $c->id ? 'selected' : '' }}>{{$c->nome}}</option>

                                        @endforeach
                                    </select>

                                </div>
                            </div>




                            {{--<div class="form-group">--}}
                                {{--<label for="imagem" class="col-sm-2 control-label">Avatar</label>--}}
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
@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Coordenações
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Editando Coordenações
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
                        <h3 class="box-title">Edição da coordenação</h3>
                        <div align="right"><a href="{{route('coordenacoes.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{route('coordenacoes.update',$coordenacao->id)}}" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_method" value="PUT">

                            {{csrf_field()}}



                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome" value="{{ $coordenacao->nome }}" type="text" class="form-control input-lg"
                                           id="nome" placeholder="Nome da cidade" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="sigla" class="col-sm-2 control-label" >Sigla</label>
                                <div class="col-sm-10">
                                    <input name="sigla" value="{{$coordenacao->sigla}}" type="text" class="form-control input-lg"
                                           id="sigla" placeholder="Sigla da cidade" autofocus>
                                </div>
                            </div>


                            {{--Ativo, Resp--}}



                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="ativo" id="ativo" class="form-control">
                                        <option value="1" {{$coordenacao->ativo == '1' ? "selected" : ""}}>Ativado</option>
                                        <option value="0" {{$coordenacao->ativo == '0' ? "selected" : ""}}>Desativado</option>

                                    </select>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="responsavel" class="col-sm-2 control-label">Responsavel</label>
                                <div class="col-sm-10">
                                    <select name="responsavel" id="responsavel" class="form-control">

                                        @foreach($coordenacao->membros as $membro)
                                            <option value="{{$membro['id']}}" {{ $membro['id'] === (isset($coordenacao->responsavel) ? $coordenacao->responsavel: '' ) ? 'selected' : '' }}>{{$membro['name']}}</option>

                                        @endforeach
                                    </select>

                                </div>
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
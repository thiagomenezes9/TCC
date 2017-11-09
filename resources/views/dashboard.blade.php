@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{--@if((Auth::user()->ativo))--}}

                    {{--<h1>Bem Vindo</h1>--}}

                {{--@else--}}

                    <div class="row">

                            <div class="panel panel-default">
                                <div class="panel-body">


                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        {{--<ol class="carousel-indicators">--}}
                                            {{--<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
                                            {{--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
                                            {{--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
                                        {{--</ol>--}}



                                        <div class="carousel-inner" role="listbox">
                                            @for($i=0;$i<count($publicacoes);$i++)
                                                <div class="item {{ $i==0 ? 'active': '' }} ">

                                                    <img src="{{$publicacoes[$i]->imagem}} " title="{{$publicacoes[$i]->titulo}}"/>

                                                    <h3 style="color:black; text-align: center">{{$publicacoes[$i]->titulo}}</h3>

                                                </div>



                                            @endfor


                                    </div>

                            </div>
                        {{--</div>--}}
                    </div>


            </div>
        </div>
    </div>
@endsection

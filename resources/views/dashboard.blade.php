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
                                    @if(empty($publicacaoes))

                                        @for($i=0;$i<count($publicacoes);$i++)
                                            <div class="item {{ $i==0 ? 'active': '' }} ">

                                                @if(empty($publicacoes[$i]->imagem))

                                                    <img id="imagem" src="{{URL::asset('/Modelo.jpg')}}"/>


                                                    <div id="titulo">
                                                        {{$publicacoes[$i]->titulo}}
                                                    </div>


                                                    <div id="texto">
                                                        {{$publicacoes[$i]->texto}}
                                                    </div>

                                                    <h3 style="color:black; text-align: center">{{$publicacoes[$i]->titulo}}</h3>

                                                @else
                                                    <img src="{{$publicacoes[$i]->imagem}} " width="100%" height="100%"
                                                         title="{{$publicacoes[$i]->titulo}}"/>

                                                    <h3 style="color:black; text-align: center">{{$publicacoes[$i]->titulo}}</h3>

                                                @endif

                                            </div>



                                        @endfor


                                    @else
                                        <h3>Sem Publicações</h3>

                                    @endif


                                </div>

                            </div>
                            {{--</div>--}}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptlocal')

    <style>
        #imagem {
            width: 1200px;
            height: 400px;
        }

        #texto {
            position: absolute;
            margin-top: -350px;
            left: 50px;
            z-index: 9999;
            color: black;
            max-width: 800px;
            font-size: 25px;
            font-weight: bold;
        }

        #titulo {
            position: absolute;
            margin-top: -410px;
            left: 200px;
            z-index: 9999;
            color: white;
            max-width: 800px;
            font-size: 42px;
            font-weight: bold;
        }

    </style>

    {{--<script>--}}
    {{--//Verifica e solicita se o usuario tem permissao para utilizar as notificações do Chrome--}}
    {{--document.addEventListener('DOMContentLoaded', function () {--}}
    {{--if (!Notification) {--}}
    {{--alert('Desktop notifications not available in your browser. Try Chromium.');--}}
    {{--return;--}}
    {{--}--}}

    {{--if (Notification.permission !== "granted")--}}
    {{--Notification.requestPermission();--}}
    {{--});--}}


    {{--</script>--}}


@endsection

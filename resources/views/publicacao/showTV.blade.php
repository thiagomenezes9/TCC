<!DOCTYPE html>

<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show



<body class="skin-green sidebar-mini">

            <section class="content">

                <div class="container-fluid spark-screen">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">



                            <div class="row">

                                <div class="panel panel-default">
                                    <div class="panel-body">


                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">




                                            <div class="carousel-inner" role="listbox">


                                                @if(empty($publicacaoes))

                                                    @for($i=0;$i<count($publicacoes);$i++)
                                                        <div class="item {{ $i==0 ? 'active': '' }} ">

                                                            @if(empty($publicacoes[$i]->imagem))

                                                                <img id="imagem" src="{{URL::asset('/Modelo.jpg')}}" title="{{$publicacoes[$i]->titulo}}" />
                                                                {{--<img src="{{URL::asset('/Modelo.jpg')}}"/>--}}


                                                                <div id="titulo">
                                                                    {{$publicacoes[$i]->titulo}}

                                                                </div>


                                                                <div id="texto">
                                                                    {{$publicacoes[$i]->texto}}

                                                                </div>

                                                                <h3 style="color:black; text-align: center">{{$publicacoes[$i]->titulo}}</h3>

                                                            @else
                                                                <img src="{{$publicacoes[$i]->imagem}} " title="{{$publicacoes[$i]->titulo}}"/>

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

            </section><!-- /.content -->

        </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts')


    <style>
        #imagem {

            width: 100%;
            height: 100%;
        }


        #texto {
            position: absolute;
            margin-top: -42%;
            left: 50px;
            z-index:9999;
            color: black;
            max-width: 800px;
            font-size: 25px;
            font-weight: bold;
        }


        #titulo{
            position: absolute;
            margin-top: -50%;
            left: 200px;
            z-index:9999;
            color: white;
            max-width: 800px;
            font-size: 42px;
            font-weight: bold;
        }

    </style>

@show


</body>
</html>

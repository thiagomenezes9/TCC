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





                                                <img id="imagem" src="{{URL::asset('/Modelo.jpg')}}"/>



                                                <div id="titulo">
                                                    TITULO
                                                </div>


                                                <div id="texto">
                                                    vou fazer um teste com muito texto para verificar o que acontece nessa bagaça, o trem dificil da porra, mano do ceu, e mais complicado que pilotar submarino. ate queria fazer uma outra coisa em vez disso, podia ta em ksa joganco no meu pc novo, seria o mais top dos top pensa num pc bom.
                                                </div>






                                            </div>

                                        </div>
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
            width: 1200px;
            height: 600px;
        }


        #texto {
        position: absolute;
        margin-top: -450px;
            left: 150px;
        z-index:9999;
            color: black;
            max-width: 800px;
            font-size: 18px;
            font-weight: bold;
        }


        #titulo{
            position: absolute;
            margin-top: -500px;
            left: 300px;
            z-index:9999;
            color: white;
            max-width: 600px;
        }

    </style>

@show


</body>
</html>

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

                                                            <img src="{{$publicacoes[$i]->imagem}} " title="{{$publicacoes[$i]->titulo}}"/>

                                                            <h3 style="color:black; text-align: center">{{$publicacoes[$i]->titulo}}</h3>

                                                        </div>



                                                    @endfor

                                                 @else
                                                    <h3>Sem publicacoes</h3>

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


@show


</body>
</html>

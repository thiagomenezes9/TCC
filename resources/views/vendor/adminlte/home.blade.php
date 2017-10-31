@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				@if((Auth::user()->ativo))

					<h1>Bem Vindo</h1>

				@else

				  <div class="row">
					  {{--@foreach(imagens)--}}
					  <div class="col-md-4">
						  <div class="panel panel-default">
							  <div class="panel-body">
								  imagem
							  </div>
							  <div class="panel-footer">
								  titulo da noticia
							  </div>
						  </div>
					  </div>
				  </div>

					VC TA DESATIVADO

					@endif
			</div>
		</div>
	</div>
@endsection

@extends('layouts.app2')

@section('style')
	{!! Html::style('') !!}
	{!! Html::style('css/select2.css') !!}
	{{--{!! Html::style('css/select2-bootstrap.css') !!}--}}
@endsection

@section('content')

	@include('desaparecidos.datosgral')
	@include('desaparecidos.domicilio')

	{{--@include('desaparecidos.datosidentidad')
	@include('desaparecidos.nacionalidad')--}}

@endsection


@section('script')
<<<<<<< HEAD
	{!! HTML::script('js/datosgral.js') !!}
	{!! HTML::script('js/domicilio.js') !!}
	{!! HTML::script('js/select2.full.js') !!}
=======
	{!! HTML::script('personal/js/datosgral.js') !!}
	{!! HTML::script('personal/js/domicilio.js') !!}
>>>>>>> 954fe60641163c0857ab881e9b6699fa5a7fef1a
@endsection

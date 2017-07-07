@extends("layouts.master")
@section("title")
	Hakkımızda
@stop
@section("content")
	@if(Auth::check())
	<form action="{{url('change/hakkimizda')}}" method="post">
		<textarea name="mytext" class="form-control my-editor">
	@endif
			{!! old('mytext', $text->text) !!}
	

	@include("includes.seo")
	
@stop
@extends("layouts.master")
@section("title")
	Referanslar 
@stop

@section("content")
	@if(Auth::check())
	<form action="{{url('change/referanslar')}}" method="post">
		<textarea name="mytext" class="form-control my-editor">
	@endif
			{!! old('mytext', $text->text) !!}
	@include("includes.seo")
@stop
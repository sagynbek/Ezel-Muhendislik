@extends("layouts.master")
@section("title")
	Kutuphane
@stop

@section("content")
	
	<form action="{{url('/library')}}" method="post" enctype="multipart/form-data">
		<input type="file" name="file" >
		<input type="submit" value="Resim ekle" name="submit">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>

@stop
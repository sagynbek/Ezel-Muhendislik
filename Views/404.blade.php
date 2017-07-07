@php
	$text = new App\Post;
	$text->seo="404";
	$errors=null;
@endphp
@extends("layouts.master")
@section("title")
	Sayfa bulunamadı
@stop
@section("content")
<main class="site-main">
	<div class="container-fluid no-left-padding no-right-padding error-content">
		<!-- Container -->
		<div class="container">
			<h2>404</h2>
			<div class="col-md-offset-3 col-md-6 error-content-box tcp_gray2">
				<h2 class="text-center">Sayfa Bulunamadı Ana Sayfaya Geri Dön </h2>
				<br>
				<a class="bg_green tc_white bg_black_h tc_white_h" href="/">Ana Sayfaya</a>
			</div>
		</div><!-- Container /- -->
	</div><!-- Error Conetent /- -->
	
</main>
@stop
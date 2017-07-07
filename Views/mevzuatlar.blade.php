@extends("layouts.master")
@section("title")
	Mevzuatlar
@stop

@section("content")

	<div class="container-fluid no-left-padding no-right-padding page-banner">
		<style type="text/css">
			.page-banner{
				background-image: none;
			}
		</style>
			<!-- Container -->
		<div class="container">
			<h3 class="tc_white">Haberler</h3>
			<ol class="breadcrumb">
				<li><a class="tc_white tc_white_h" href="index.html">Anasayfa</a></li>
				<li class="active tc_white">Haberler</li>
			</ol>
		</div><!-- Container /- -->
	</div><!-- Page Banner /- -->

	<main class="site-main">
		<!-- Blog Left Sidebar -->
		<div class="container-fluid no-left-padding no-right-padding blog-grid">
			<!-- Container -->
			<div class="container">
				<!-- Row -->
				<div class="row">
<!-- Content Area -->
					<div class="col-md-8 col-sm-6 col-xs-12 content-area no-left-padding no-right-padding">

						@if($posts!=null)
						@foreach($posts as $i=> $post)
						@php
							$first = strpos($post->image, '"');
							$first++;
							$second = strpos($post->image, '"',$first+1);
							$link=substr($post->image,$first,$second-$first);
						@endphp

						<div class="col-md-6 col-sm-12 col-xs-6">
							<div class="type-post">
								<!-- Entry Header -->
								<div class="entry-header brd_color_light_gray">
									<h3 class="entry-title tc_dark"><a class="tc_dark tc_green_h" href="{{url('mevzuatlar/'.$post->slug)}}">{{$post->title}}</a></h3>
									<div class="entry-meta">
										<span><i class="fa fa-calendar-o tc_green"></i><a class="tc_gray tc_green_h" href="#">{{$post->created_at}}</a></span>
										<span><i class="fa fa-user tc_green"></i><a class="tc_gray tc_green_h" href="#">Admin</a></span>
									</div>
								</div><!-- Entry Header /- -->
								<!-- Entry Cover -->
								<div class="entry-cover">
								<style type="text/css">
									.lolwer{
										max-height: 222px;
										overflow: hidden;
										width: 100%
										/*height:expression(this.scrollHeigt)<222?"auto":222;*/
									}

								</style>
									<a href="{{url('mevzuatlar/'.$post->slug)}}">
									<div class="lolwer">
										<img style="width: 100%; height: auto" alt="{{$post->title}}" src="{!!str_replace('shares/','shares/thumbs/' , $link);!!}">
									</div></a>
									<div class="hover-content">
										<a class="bg_white tc_green tc_dark2_h text-success" href="{{url('mevzuatlar/'.$post->slug)}}"><i class="fa fa-link" style="padding:7px"></i></a>
									</div>
								</div><!-- Entry Cover /- -->
								<!-- Entry Content -->
								<div class="entry-content brd_color_light_gray tcp_gray2">
									<div style="height:3em">{!! str_limit($post->body,100) !!}</div>
									<a class="tc_dark brd_color_dark tc_white_h brd_color_green_h bg_green_h" href="{{url('mevzuatlar/'.$post->slug)}}">Daha Fazla Oku</a>
								</div><!-- Entry Content /- -->
							</div>
						</div>
						@endforeach
						@endif
					</div><!-- Content Area /- -->
			@include("includes.widget")
		</div><!-- Blog Left Sidebar -->

		
		@include('includes.pagination')
				{{-- <ul class="pagination">
					<li><a href="#" aria-label="Önceki"><i class="fa fa-angle-double-left"></i>Önceki</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">6</a></li>
					<li><a href="#" aria-label="Sonraki">Sonraki<i class="fa fa-angle-double-right"></i></a></li>
				</ul> --}}
		
	</main>
<!-- ################################################################################################
@stop
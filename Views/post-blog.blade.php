@extends("layouts.master")
@section("title")
	{{$text->title}}
@stop
@section("content")
<!-- Page Banner -->
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
	<div class="col-md-8 col-sm-6 content-area blog-single-curv">
		<article class="type-post">
								<!-- Entry Cover -->
			<div class="entry-cover " >
				<p class="img-responsive" style="max-height: 318px; overflow: hidden; width: 100%; margin-bottom: 0px">
					{!!$text->image!!}
				</p>
			</div><!-- Entry Cover /- -->
			<!-- Entry Header -->
			<div class="entry-header bg_dark2" >
				<div class="col-xs-6">
					<h3 class="entry-title tc_white">{{$text->title}} </h3>
					<div class="entry-meta">
						<span><i class="fa fa-calendar-o tc_green"></i><a class="tc_white tc_green_h" href="#">{{$text->created_at}}</a></span>						
						<span><i class="fa fa-bookmark-o tc_green" aria-hidden="true"></i><a class="tc_white tc_green_h" href="#">{{$text->category->text}}</a></span>				
					</div>
				</div>

				@if(Auth::check())
				<div class="col-xs-6 pull-rights">		
					<form class="col-xs-2 pull-right" method="get" action ="{{url('/mevzuatlar/changepost_'.$text->id)}}">
						<button class="btn btn-md btn-success">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</button>
					</form>

					<form class="col-xs-2 pull-right" id="delete" method="get" action="{{url('/mevzuatlar/delete/'.$text->slug)}}">
						<button class="btn btn-md btn-danger" id="deleteButton">
							<i class="fa fa-trash" aria-hidden="true"></i>
						</button>	
					</form>



					<script type="text/javascript">
						$("#delete").submit(function (e) {
							e.preventDefault();
							if(confirm("Silmek istiyormusunuz?")){
								$('#delete').submit();
							}else{
								return false;
							}
						});
					</script>
				
				</div>
				@endif
			</div><!-- Entry Header /- -->
			<!-- Entry Content -->
			<div class="entry-content brd_color_light_gray tcp_gray2" style="background-color: white">
				{!! $text->body !!}
			</div><!-- Entry Content /- -->
		</article>
	</div><!-- Content Area /- -->
	{{-- <script>
		 
	   $('#delete_button').on('click', function () {
	      if (!confirm("Bu blogu silmek istermisiniz?")){
	         return false;
	      }
	      else
	      	consoleLog("Hello");

	   });
		
	</script> --}}
	@include("includes.widget")
@stop
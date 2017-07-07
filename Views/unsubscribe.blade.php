@extends("layouts.master")
@section("title")
	Galeri
@stop
@section("content")
	
	<main class="site-main">
<!-- Callout Section -->
		<br>
		<div class="container-fluid no-left-padding no-right-padding callout-section " style="background-color: red">
			<!-- Container -->
			<div class="container">
				<div class="col-md-offset-1 col-md-10 col-xs-12">
					<div class="newsletter-content tcp_white">
						<h4 class="tc_white">Aboneliğinizi kaldırın </h4>
						<div class="input-group">
							<form action="{{url('unsubscibe')}}" method="post">
								<input type="email" name="email" class="form-control tc_dove_gray" placeholder="E-posta addresi..." required>
								<span class="input-group-btn">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button class="btn btn-default bg_dark2 tc_white tc_dark2_h bg_white_h" type="submit">Kaldır</button>
								</span>
							</form>
						</div><!-- /input-group -->
					</div>
				</div>
			</div><!-- Container /- -->
		</div><!-- Callout Section /- -->
	</main>

@stop
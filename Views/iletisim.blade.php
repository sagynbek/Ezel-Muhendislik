@extends("layouts.master")
@section("title")
	İletişim
@stop

@section("content")

	<div class="container-fluid no-left-padding no-right-padding contact-content margin-top-2">
		<!-- Container -->
		<div class="container">
			<!-- Row -->
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="contact-detail" style="margin-bottom:2em">
						<h3>Bizim Adres</h3>
							<div class="detail-box tcp_dark">
								<i class="fa fa-map-marker bg_dark2 tc_white"></i>
								<p><span>Konum :</span> Eski Kuyumcular Mahallesi, Hükümet Cd. No:50, 10010 Karesi/Balıkesir</p>
							</div>
							<div class="detail-box tcp_dark">
								<i class="fa fa-phone bg_dark2 tc_white"></i>
								<p><span>İletişim :</span> <a class="tc_dark tc_green_h" href="tel:+90 505 577 96 86">+90 505 577 96 86</a></p>
							</div>
							<div class="detail-box tcp_dark">
								<i class="fa fa-envelope-o bg_dark2 tc_white"></i>
								<p><span>E-posta :</span> <a class="tc_dark tc_green_h" href="mailto:a.atalay@ezelmuhendislik.com.tr">a.atalay@ezelmuhendislik.com.tr</a></p>
							</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 contact-form">
					<h3>Bize Mesaj Yazın</h3>
					<form class="row" method="post" action="{{route('iletisim-mail')}}" enctype="multipart/mixed" target="_blank">
						<div class="col-md-6 form-group">
							<input type="text" class="form-control tc_dove_gray" placeholder="Isim" name="contact-name" id="input_fname" required>
						</div>
						<div class="col-md-6 form-group">
							<input type="text" class="form-control tc_dove_gray" placeholder="E-posta" name="contact-email" id="input_email" required>
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control tc_dove_gray" placeholder="Konu" name="contact-topic" required>
						</div>
						<div class="col-md-12 form-group">
							<textarea class="form-control tc_dove_gray" placeholder="Mesajınız" name="textarea-message" id="textarea_message" required></textarea>
						</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="col-md-12 form-group">
							<input type="submit" class="bg_green tc_white bg_black_h" value="GÖNDER">
						</div>
						<div id="alert-msg" class="alert-msg"></div>
					</form>
				</div>
			</div><!-- Row /- -->
		</div><!-- Container /- -->
	</div><!-- Contact content /- -->
	
	<!-- Map Section -->
	<style>
	    .scrolloff {
	        pointer-events: none;
	    }
	</style>
	<script>
	    $(document).ready(function () {
	        $('#map').addClass('scrolloff');                // set the mouse events to none when doc is ready
	        
	        $('#overlay').on("mouseup",function(){          // lock it when mouse up
	            $('#map').addClass('scrolloff'); 
	            //somehow the mouseup event doesn't get call...
	        });
	        $('#overlay').on("mousedown",function(){        // when mouse down, set the mouse events free
	            $('#map').removeClass('scrolloff');
	        });
	        $("#map").mouseleave(function () {              // becuase the mouse up doesn't work... 
	            $('#map').addClass('scrolloff');            // set the pointer events to none when mouse leaves the map area
	                                                        // or you can do it on some other event
	        });
	        
	    });
	</script>
	

	<div id="overlay" class="container-fluid no-left-padding no-right-padding map-section map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3072.158308868645!2d27.881719114362266!3d39.646151610067385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b7004be1e82847%3A0x1165a69868e39986!2sEski+Kuyumcular+Mahallesi%2C+H%C3%BCk%C3%BCmet+Cd.+No%3A50%2C+10010+Karesi%2FBal%C4%B1kesir!5e0!3m2!1sen!2str!4v1497315770172" class="img-resposive" width="100%" height="350" id="map" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div><!-- Map Section /- -->

	 @if(Auth::check())
		<div class="form-group" style="margin-top: 2em">
		<form action="mailto:{{$emails}}" method="post" target="_blank" enctype="text/html">
			<input style="display:none" type="text" name="i" value="Abonelikten çıkmak için bu linke tıklayın: www.ezelmuhendislik.com.tr/unsubscibe" >
			<button type="submit" class="btn btn-success ">Herkeze meil ilet</button>
		</form>

			<a href="/allsubscribers" class="btn btn-info" target="_blank">Bütün meileri görüntüle</a>
		</div>
	@endif 
	<main class="site-main"  style="clear:both">
<!-- Callout Section -->
	<br>
	<div class="container-fluid no-left-padding no-right-padding callout-section bg_green">
		<!-- Container -->
		<div class="container">
			<div class="col-md-offset-1 col-md-10 col-xs-12">
				<div class="newsletter-content tcp_white">
					<h4 class="tc_white">Bültenimize abone olun</h4>
					<p>Bültenlere üye olun ve en son haberleri ile güncel kalın</p>
					<div class="input-group">
						<form action="{{url('subscibe')}}" method="post">
							<input type="email" name="email" class="form-control tc_dove_gray" placeholder="E-posta addresi..." required>
							<span class="input-group-btn">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button class="btn btn-default bg_dark2 tc_white tc_dark2_h bg_white_h" type="submit">Gönder</button>
							</span>
						</form>
					</div><!-- /input-group -->
				</div>
			</div>
		</div><!-- Container /- -->
	</div><!-- Callout Section /- -->
</main>
@stop
<footer style="clear:both" id="footer-main" class="container-fluid no-left-padding no-right-padding footer-main">
		<!-- Top Footer -->
		<div class="container-fluid no-left-padding no-right-padding top-footer">
			<!-- Container -->
			<div class="container">
				<!-- Row -->
				<div class="row">
				
					<!-- Widget About -->
					<div class="col-md-4 col-sm-6 col-xs-6">
						<aside class="widget widget_about">
							<a href="/"><img src="{{asset('assets/images/logo-footer.png')}}" alt="Logo" /></a>
							<h2 style="color: white" class="text-center">Mühendislik, Mimarlık, Danışmanlik</h2>
						</aside>
					</div><!-- Widget About /- -->
					
					<!-- Widget Links -->
					<div class="col-md-4 col-sm-6 col-xs-6">
						<aside class="widget widget_contact">
							<h3 class="widget-title">İletişim</h3>
							<p><i class="fa fa-map-marker"></i> Eski Kuyumcular Mah. Hükümet Cad. Köklü İşhana Kat 3 - No:50 Kaiseri/BALIKESIR</p>
							<p><i class="fa fa-mobile"></i><a href="tel:+90 505 577 96 86">+90 505 577 96 86</a></p>
							<p><i class="fa fa-envelope"></i><a href="mailto:a.atalay@ezelmuhendislik.com.tr">a.atalay@ezelmuhendislik.com.tr</a></p>
							<p><i class="fa fa-internet-explorer"></i><a target="_blank" href="http://www.ezelmuhendislik.com.tr">www.ezelmuhendislik.com.tr</a></p>
						</aside>
					</div><!-- Widget Links /- -->
					<div class="col-md-4 col-sm-6 col-xs-6">
						<aside class="widget widget_contact">
							<form class="form-horizontal" method="post" action="{{route('small-mail')}}" enctype="multipart/mixed" target="_blank">{{-- plain/text --}}
								<fieldset>

								<!-- Form Name -->
								<legend class="widget-title" >Bıze Mesaj Birakın</legend>

								<!-- Text input-->
								<div class="form-group">
								  <div class="col-md-12	">
								  <input id="mail" name="mail" type="email" placeholder="e-mail" class="form-control input-md" required="">
								  </div>
								</div>

								<!-- Textarea -->
								<div class="form-group">
								  <div class="col-md-12">                     
								    <textarea class="form-control" id="mesaj" name="mesaj" placeholder="Mesaj Yazın"></textarea>
								  </div>
								</div>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">

								<!-- Button -->
								<div class="form-group">
									  <div class="col-md-12 text-center">
								    <button name="singlebutton" class="btn btn-success">GÖNDER</button>
								  </div>
								</div>

								</fieldset>
							</form>

						</aside>
					</div>
					
					
					
					
				</div><!-- Row /- -->
			</div><!-- Container /- -->
		</div><!-- Top Footer -->
		<!-- Bottom Footer -->
		<!-- <div class="container-fluid bottom-footer no-left-padding no-right-padding">
			
			
		</div> --><!-- Bottom Footer /- -->
</footer><!-- Footer Main /- -->
	
	<!-- JQuery v1.12.4 -->
	<script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>

	<!-- Library - Js -->
	<script src="{{asset('assets/js/lib.js')}}"></script>
	
	<!-- RS5.3`````` Core JS Files -->
	<script type="text/javascript" src="{{asset('assets/revolution/js/jquery.themepunch.tools.min.js?rev=5.0')}}"></script>
	<script type="text/javascript" src="{{asset('assets/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0')}}"></script>
	<script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>

	
	<!-- Library - Theme JS -->
	<script src="{{asset('assets/js/functions.js')}}"></script>

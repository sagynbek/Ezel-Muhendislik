
	<!-- Loader -->
	<div id="site-loader" class="load-complete">
		<div class="loader">
			<div class="line-scale-pulse-out"><div></div><div></div><div></div><div></div><div></div></div>
		</div>
	</div><!-- Loader /- -->
	
	<!-- Header Section -->
	<header class="header_s header_s1" style="margin-bottom: 0px">
		
		<!-- Ownavigation -->
		<nav class="navbar ownavigation bg_black menu_color" style="background-color: #FFF">
			<!-- Container -->
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('assets/images/logo.png')}}" alt="logo" style="width: 150px; height: auto;"></a>
				</div>
				<style>
					#navbar>ul>li>a{
						color:#02406D;
					}
					#navbar>ul>li>a:hover{
						color:#FFF;
					}
					
				</style>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav" style="color:#02406D">
						<li>
							<a href="/" title="ANASAYFA">ANASAYFA</a>
						</li>
						<li>
							<a href="/hakkimizda" title="HAKKIMIZDA">HAKKIMIZDA</a>
						</li>
						<li>
							<a href="/mevzuatlar" title="MEVZUATLAR">MEVZUATLAR</a>
						</li>
						<li>
							<a href="/referanslar" title="REFERANSLAR">REFERANSLAR</a>
						</li>
						<li>
							<a href="/galeri" title="GALERI">GALERI</a>
						</li>
						<li>
							<a href="/iletisim" title="İLETİŞİM">İLETİŞİM</a>
						</li>
						@if(Auth::check())
						<li>
							<a href="{{url('mevzuatlar/newpost')}}">
								<i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>
								Blog Ekle
							</a>
						</li>
						<li>
							<a href="/logout">Çıkış yap</a>
						</li>
						@endif

						
					</ul>
				</div>
				
			</div><!-- Container /- -->
		</nav><!-- Ownavigation /- -->
		
	</header><!-- Header Section /- -->

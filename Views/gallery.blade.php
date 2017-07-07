@extends("layouts.master")
@section("title")
	Galeri
@stop
@section("content")
	<script>
	  var editor_config1 = {
	    path_absolute : "/",
	    height: 0,
	    selector: "textarea#textarea1",
	    plugins: [
	      "image"
	    ],
	    toolbar: "link image media",

  		menubar: false,
	    toolbar1: 'link image',
	    forced_root_block:"",
		  image_advtab: true,
		  statusbar:false,
	    relative_urls: false,
	    file_browser_callback : function(field_name, url, type, win) {
	      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
	      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

	      var cmsURL = editor_config1.path_absolute + 'laravel-filemanager?field_name=' + field_name;
	      if (type == 'image') {
	        cmsURL = cmsURL + "&type=Images";
	      } 

	      tinyMCE.activeEditor.windowManager.open({
	        file : cmsURL,
	        title : 'Filemanager',
	        width : x * 0.8,
	        height : y * 0.8,
	        resizable : "yes",
	        close_previous : "no"
	      });
	    }
	  };

	  tinymce.init(editor_config1);
	</script>
	
	<main class="site-main">
		<!-- Gallery Large -->
		<div class="container-fluid no-left-padding no-right-padding gallery-main gallery-fitrow gallery-small">
			<!-- Container -->
			<div class="container">
				<!-- Section Header -->
				
				<!-- Section Header -->
					<div class="section-header tcp_gray">
						<h3 class="tc_dark tcspan_green"><span>Galeri</span></h3>
						@if(Auth::check())
							<form class="form-horizontal" role="form" action="{{url('galeri/ekle')}}" method="post">
							    <div class="row">
							      <div id="moreField" style="display:none;">
							        <div class="form-group">
							          <label class="control-label col-sm-2" for="fieldone">Sadece Bir Resim Seçin</label>
							          <div class="col-sm-10">
							            <textarea id="textarea1" name="myimage" class="form-control" col="5" placeholder="This is text area"></textarea>
							          </div>
							        </div>
							        <input type="hidden" name="_token" value="{{ csrf_token() }}">
							        <div class="form-group">
							          <div class="col-sm-12">
							        	<button type="submit" class="btn btn-success pull-right" style="float:right;">Yükle</button>
							          </div>
							        </div>
							      </div>
							    </div>
							  </form>
							  	<h2>
						          <button id="more" class="btn btn-info" onclick="$('#moreField').display()">{{-- slideToggle --}}
									<i class="fa fa-plus-square" aria-hidden="true">
									</i>
									RESIM EKLE
						          </button>
								</h2>
						@endif
					</div><!-- Section Header /- -->

				{{-- <!-- Section Header -->
				<div class="section-header tcp_gray">
					<h3 class="tc_dark tcspan_green"><span>Galeri</span></h3>
					@if(Auth::check())
					<form action = "{{url('galeri/ekle')}}" method="post">
						<textarea type="text" id="textarea1" name="myimage" class="form-control input-md my-image" placeholder="Resim Seçin" required ></textarea>
						<h2>
							<button type="submit" class="btn btn-info">
							<i class="fa fa-plus-square" aria-hidden="true">
							</i>
							RESIM EKLE
							</button>
						</h2>
						<input type="submit" value="Submit (test)">

						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					</form>
					@endif
				</div><!-- Section Header /- --> --}}
				<!-- Gallery Filter -->
				
			
				<!-- Gallery List -->
				<div class="row gallery-list">

					@foreach($galleries as $gallery)
					@php
						$first = strpos($gallery->image, '"');
						$first++;
						$second = strpos($gallery->image, '"',$first+1);
						$link=substr($gallery->image,$first,$second-$first);
					@endphp
					{{-- {!!substr($gallery->image,$first,$second-$first)!!}
					<br> --}}
					<div class="col-xs-3 gallery-box climate">
						<div class="gallery-content" style="text-align:center">
							<i>
								<img src="{!!str_replace('shares/','shares/thumbs/' , $link);!!}">
							</i>
							<div class="gallery-detail" style="text-align:center; line-height: 26px">
								<a class="zoom" href="{!!$link!!}"><i class="fa fa-picture-o"  style="padding-top: 7px"></i></a>
								@if(Auth::check())
									<a href="{{url('galeri/delete/'.$gallery->id)}}"><i class="fa fa-trash" aria-hidden="true" style="padding-top: 7px"></i></a>
								@endif
							</div>
						</div>
					</div>
					@endforeach
				</div><!-- Gallery List /- -->
				
				<div class="clearfix"></div>
			</div><!-- Container /- -->
		</div><!-- Gallery Large /- -->		
	</main>
	
@stop
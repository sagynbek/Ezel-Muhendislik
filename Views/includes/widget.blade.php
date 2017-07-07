<div class="col-md-4 col-sm-6 col-xs-12 widget-area">
	<!-- Widget : Category -->
	<aside class="widget widget_categories">
		<div class="widget-title">
			<h3 class="tc_dark">Kategoriler</h3>
		</div>
		<ul>
			<li><a class="tc_dark tc_green_h" href="{{url('mevzuatlar')}}
				">Hepsi</a></li>
			@foreach($categories as $category)
				<li><a class="tc_dark tc_green_h" href="{{url('mevzuatlar/category_'. str_slug(strtolower($category->text),'_'))}}">{{$category->text}}</a></li>
			@endforeach
			
		</ul>
	</aside><!-- Widget : Category /- -->
	
<!-- ######################################################################## -->
	
	<!-- Widget : Recent Post -->
	<aside class="widget widget_recentposts">
		<div class="widget-title">
			<h3 class="tc_dark">Diğer Yayınlar</h3>
		</div>
		@foreach($otherPosts as $other)
			@php
				$first = strpos($other->image, '"');
				$first++;
				$second = strpos($other->image, '"',$first+1);
				$link=substr($other->image,$first,$second-$first);
			@endphp
			<div class="latest-content">
				<a href="{{url('mevzuatlar/'.$other->slug)}}" title="Other Posts"><i>
					<p style="width: 50px;height:50px"><img style="width: 100%; height: auto;" src="{!!str_replace('shares/','shares/thumbs/' , $link);!!}">
					</p>
					</i></a>
				<h5><a class="tc_dark tc_green_h" title="Pellentesque suscipit ante at" href="{{url('mevzuatlar/'.$other->slug)}}">{{ str_limit($other->title,50) }}</a></h5>
				<span><i class="fa fa-calendar-check-o tc_green"></i><a class="tc_dove_gray tc_green_h" href="#">{{$other->created_at}}</a></span>
			</div>
		@endforeach
		
	</aside><!-- Widget : Recent Post -->
<!-- ########################################################################## -->

</div>
@extends("layouts.master")
@section("title")
	Post
@stop
@section("content")
{{-- <script>
tinymce.init({
  selector: ".textarea123",  // change this value according to your HTML
  plugins: "image",
  menubar: "insert",
  toolbar: "image",
  image_list: [
    {title: 'My image 1', value: 'http://www.tinymce.com/my1.gif'},
    {title: 'My image 2', value: 'http://www.moxiecode.com/my2.gif'}
  ]
});
</script> --}}
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

	<form action = "{{url('mevzuatlar/post')}}" method="post" id="kaybolur">
		<div class="container">
		  <div class="row">
		 	<div class="col-md-6">
		       <div class="form-group">
		       	<span class="label label-default">Başlık Yazin</span>
		       	<input type="text" name="title" value = "{{$text->title}}" class="form-control input-md" placeholder="Başlık Yazin" required>
		       </div>
		    </div>
		    <div class="col-md-6">
		      <div class="form-group">
		       <span class="label label-default">Resim Seçin:</span>

		       <textarea type="text" id="textarea1" name="myimage" class="form-control input-md my-image" placeholder="Resim Seçin" required  >{!! $text->image!!} </textarea>
		      </div>
		    </div>
		    <div class="col-md-12">
		      <span class="label label-default">Burdan Web Sayfayı Düzeltin</span>
		      <textarea name="mytext" class="form-control input-md my-editor"> 
		    
		      {!! $text->body!!}
		      </textarea>
		    </div>
		    <div class="col-md-6">
		      <div class="form-group">
		        <span class="label label-default">Kategori Seçin:</span>
		        <select name= "selectcategory" class="form-control">
					@foreach($categories as $category)
						<option @if($category->id==$text->category_id) selected="selected" @endif> {{$category->text}}</option>
					@endforeach
				</select>
		      </div>
		    </div>
		    <div class="col-md-6">
		      <div class="form-group">
		        <span class="label label-default">Yeni kategori Ekleyin</span>
		        <input type="text" name="newcategory" class="form-control input-md" placeholder="Yeni Kategori Ekleyin">
		      </div>
		    </div>
		    <div class="col-md-12">
		      <div class="form-group">
			      <span class="label label-default">Seo İçin İçerik Ekleyin (160 karakter)</span>
		    	  <input type="text" name="seo" class="form-control input-md" placeholder="Seo İçin İçerik Ekleyin" maxlength="160" required value="{{ $text->seo }}">
		      </div>
		    </div>
		    <div class="col-md-12">
		      <div class="form-group">
		      	<button class="btn btn-block btn-success">Kaydet</button>
		        <button class="btn btn-block btn-warning">En son kaydedilmiş haline getir</button>
		        

		        
		      </div>
		    </div>
		  </div>
		</div>
		<input type="hidden" name="_id" value="{{ $text->id }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
	
@stop


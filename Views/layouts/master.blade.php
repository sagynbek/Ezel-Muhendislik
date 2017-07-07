{{-- <!DOCTYPE html> --}}
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title') - Ezel Mühendislik Mimarlık Danışmanlık</title>
	<meta name="description" content="{{$text->seo}}">
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/title-logo.png')}}" />


	<!-- Latest compiled and minified CSS -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	
	<!-- For iPhone 4 Retina display: -->
	<link rel="apple-touch-icon-precomposed" href="{{asset('assets/images//apple-touch-icon-114x114-precomposed.png')}}">
	
	<!-- For iPad: -->
	<link rel="apple-touch-icon-precomposed" href="{{asset('assets/images//apple-touch-icon-72x72-precomposed.png')}}">
	
	<!-- For iPhone: -->
	<link rel="apple-touch-icon-precomposed" href="{{asset('assets/images//apple-touch-icon-57x57-precomposed.png')}}">	
	
	<!-- Library - Google Font Familys -->
	<link href="https://fonts.googleapis.com/css?family=Oxygen:300,400,700|Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i|Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="{{asset('assets/revolution/css/settings.css')}}">
	
	
	<!-- RS5.3 Layers and Navigation Styles -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/revolution/css/layers.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/revolution/css/navigation.css')}}">
		
	<!-- Library -->
    <link href="{{asset('assets/css/lib.css')}}" rel="stylesheet">    
	
	<!-- Custom - Common CSS -->
	<link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/elements.css')}}" rel="stylesheet">	
	<link href="{{asset('assets/css/rtl.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>
	  var editor_config = {
	    path_absolute : "/",
	    height: 500,
	    selector: "textarea.my-editor",
	    forced_root_block:"",
	    statusbar:false,
	    extended_valid_elements: ['span[class|style]', 'i[class|style]'],
	    plugins: [
	      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
	      "searchreplace wordcount visualblocks visualchars code fullscreen",
	      "insertdatetime media nonbreaking save table contextmenu directionality",
	      "emoticons template paste textcolor colorpicker textpattern"
	    ],
	    content_css: [
		    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		    '//www.tinymce.com/css/codepen.min.css',
		    '/assets/revolution/css/settings.css', '/assets/revolution/css/layers.css', '/assets/revolution/css/navigation.css', '/assets/css/lib.css', '/assets/css/plugins.css', '/assets/css/elements.css', '/assets/css/rtl.css', '/assets/css/style.css'
		  ],
	    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",

		  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
		      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",

		  image_advtab: true,
		  templates: [
		    { title: 'Test template 1', content: 'Test 1' },
		    { title: 'Test template 2', content: 'Test 2' }
	  	  ],
	    relative_urls: false,
	    file_browser_callback : function(field_name, url, type, win) {
	      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
	      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

	      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
	      if (type == 'image') {
	        cmsURL = cmsURL + "&type=Images";
	      } else {
	        cmsURL = cmsURL + "&type=Files";
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

	  tinymce.init(editor_config);
	</script>
	
</head>
<body data-offset="200" data-spy="scroll" data-target=".ownavigation">
	@include("includes.header") 

	@if(Auth::check())
	<div class="container" style="width: 95%">
	@endif
	@include("includes.message-block")
	
	@yield("content")

	@if(Auth::check())
	</div>
	@endif
	
	@include("includes.footer")

</body>
</html>
 @if(count($errors)>0)
    <br><br>
	<div class="row">
        <div class="col-md-6 col-offset-md-3">
            <ol class="text-warning"  style="">
                @foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
            </ol>
        </div>
    </div>

@endif

@if(Session::has('warning'))
    <br><br>
	<div class="container">
        <div class="col-md-12 text-center">
            <p class="text-danger" style="font-size: 1.5em">{{Session::get('warning')}}</p>
        </div>
    </div>
@endif
@if(Session::has('success'))
    <br><br>
    <div class="container">
        <div class="col-md-12 text-center">
            <p class="text-success" style="font-size: 1.5em">{{Session::get('success')}}</p>
        </div>
    </div>
@endif
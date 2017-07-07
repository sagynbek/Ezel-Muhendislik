<?php
namespace App\Http\Controllers;
/**
* 
*/
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller{

	use Notifiable;
	
	public function getLogout(){
		Auth::logout();
		return redirect()->route("home");
	}

}

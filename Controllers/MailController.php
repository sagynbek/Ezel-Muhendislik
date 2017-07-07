<?php
namespace App\Http\Controllers;
/**
* 
*/
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller{

	use Notifiable;
	public function postIletisimMail(Request $request){
		$topic = $request['contact-topic'];
		$name = $request['contact-name'];
		$email = $request['contact-email'];
		$message = $request['textarea-message'];
		$dollar = "&body=";

		$uri = "mailto:a.atalay@ezelmuhendislik.com.tr?subject=".$topic.$dollar."Selam ben ". $name.". ".$message;
		return redirect($uri);
	}
	public function postSmallMail(Request $request){
		$topic = "Ezel Muhendislik";
		$email = $request['mail'];
		$message = $request['mesaj'];
		$dollar = "&body=";

		$uri = "mailto:a.atalay@ezelmuhendislik.com.tr?subject=".$topic.$dollar.$message;
		return redirect($uri);
	}
	public function sendMailToMe(){
		// $user = User::where('id',2)->first();
		// $mes = new Post;
		// $mes->body = "I'm beautiful body";
		// $mes->title= "Testing";
		// Mail::to($user)->send(new Post($mes));
		// return "Success!";

		//222222222222222222222222
		// $title = "Titling";
  //       $content = "Contentingg. Yeah it's me, how are you doing? asda<br> asdqweasdlkj d<br>lfjlksjdlasd;asdm;asd;la<br> sd;lad;alsdk; al<br> skdc,.xm<br> .,mzxckj hkjhdkjxcm zbxcm<br> asdasd asdasd";

  //       Mail::send('emails.send-mail', ['title' => $title, 'content' => $content], function ($message)
  //       {

  //           $message->from('me@gmail.com', 'Sagynbek Kenzhebaev');
		// 	$message->to('kenzhebaev9797@gmail.com');
  //           // $message->to(['kenzhebaev9797@gmail.com','kenjebaev_97@mail.ru','e217457@metu.edu.tr']);

  //       });

		//33333333333333333333333333333333333
		$beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
	    $beautymail->send('emails.welcome', [], function($message)
	    {
	        $message
				->from('bar@example.com')
				->to('foo@example.com', 'John Smith')
				->subject('Welcome!');
	    });
	    
        return "Got here!";
	}
}

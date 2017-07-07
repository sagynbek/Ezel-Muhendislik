<?php
namespace App\Http\Controllers;
/**
* 
*/
use App\Subscriber;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class SubscriberController extends Controller{
	public function postAddSubscriber(Request $request){
		$subscriber = new Subscriber;
		if(Subscriber::where('email',$request['email'])->get()->count()){
			if($subscriber->cancelled==true)
				$subscriber->cancelled=false;
			else
				return back()->withWarning("Sizin aboneliğiniz var");
		}

		$subscriber->email = $request['email'];
		$subscriber->save();
		return back()->withSuccess("Başarıyla abone oldunuz");
	}

	public function postRemoveSubscriber(Request $request){
		$subscriber = Subscriber::where('email',$request['email'])->first();
		if($subscriber && $subscriber->cancelled==false){
			$subscriber->cancelled=true;
			$subscriber->update();
			return redirect()->route("home")->withSuccess("Başarıyla abonelikten çıktınız");
		}
		else{
			return redirect()->route("home")->withWarning("Aboneliğiniz bulunmadı");
		}
	}
	public function getAllSubscribers(){
		$subs = Subscriber::where("cancelled",false)->get();
        $emails="";

        if(Auth::check()){
            foreach ($subs as $key=>$sub) {
                $emails=$emails.$sub->email;
                $emails=$emails.",";
            }
        }
        return $emails;
	}

	public function getRemoveSubscriber(){

        $text = new Post;
        $text->seo = "Aboneliği kaldır";
		return view('unsubscribe',['text'=>$text]);
	}
}

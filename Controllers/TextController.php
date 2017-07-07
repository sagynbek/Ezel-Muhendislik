<?php

namespace App\Http\Controllers;

use App\Hakkimizda;
use App\Gallery;
use App\Page;
use App\Category;
use App\Post;
use App\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TextController extends Controller
{
    private $paginate;

    public function __construct(){
        $this->paginate = 4;
    }

    public function getIndex(){
        $text = Page::where("tag","index")->first();
        $galleries = Gallery::inRandomOrder()->take(5)->orderBy('id','desc')->get();
        $posts = Post::orderBy('id','desc')->take(3)->get();

        return view("index",["text"=>$text,'galleries'=>$galleries,'posts'=>$posts]);
    }
    public function postIndex(Request $request){

        if($request["factory"]=="En ilk haline getir (geri getirilmez)"){
            $textFactory = Page::where("tag","indexfactory")->first();
            $text = Page::where("tag","index")->first();
            $text->text = $textFactory->text;
            $text->seo = $textFactory->seo;
            $text->save();
            return redirect()->route("home")->withSuccess("Sayfanız başarıyla ilk hale dönmüştür");
        }

        $text = Page::where("tag","index")->first();
        $text->text = $request["mytext"];
        $text->seo = $request["seo"];
        $text->update();
        return redirect()->route("home")->withSuccess('Sayfanız başarıyla kaydedilmıştir');
    }

    public function getHakkimizda(){
        $text = Page::where("tag","hakkimizda")->first();
        return view("hakkimizda",["text"=>$text]);
    }
    public function postHakkimizda(Request $request){

        if($request["factory"]=="En ilk haline getir (geri getirilmez)"){
            $textFactory = Page::where("tag","hakkimizdafactory")->first();
            $text = Page::where("tag","hakkimizda")->first();
            $text->text = $textFactory->text;
            $text->seo = $textFactory->seo;
            $text->save();
            return redirect()->route("hakkimizda")->withSuccess("Sayfanız başarıyla ilk hale dönmüştür");
        }


        $text = Page::where("tag","hakkimizda")->first();
        $text->text = $request["mytext"];
        $text->seo = $request["seo"];
        $text->update();
        return redirect()->route("hakkimizda")->withSuccess('Sayfanız başarıyla kaydedilmıştir');
    }

    public function getIletisim(){
        $text = Page::where("tag","iletisim")->first();
        $subs = Subscriber::where("cancelled",false)->get();
        $emails="";

        if(Auth::check()){
            foreach ($subs as $key=>$sub) {
                $emails=$emails.$sub->email;
                $emails=$emails.",";
            }
        }
        return view("iletisim",["text"=>$text,"emails"=>$emails]);
    }
    public function postIletisim(Request $request){

        if($request["factory"]=="En ilk haline getir (geri getirilmez)"){
            $textFactory = Page::where("tag","iletisimfactory")->first();
            $text = Page::where("tag","iletisim")->first();
            $text->text = $textFactory->text;
            $text->seo = $textFactory->seo;
            $text->save();
            return redirect()->route("iletisim")->withSuccess("Sayfanız başarıyla ilk hale dönmüştür");
        }

        $text = Page::where("tag","iletisim")->first();
        $text->text = $request["mytext"];
        $text->seo = $request["seo"];
        $text->update();
        return redirect()->route("iletisim")->withSuccess('Sayfanız başarıyla kaydedilmıştir');
    }

    public function getReferanslar(){
        $text = Page::where("tag","referanslar")->first();
        return view("referanslar",["text"=>$text]);
    }
    public function postReferanslar(Request $request){

        if($request["factory"]=="En ilk haline getir (geri getirilmez)"){
            $textFactory = Page::where("tag","referanslarfactory")->first();
            $text = Page::where("tag","referanslar")->first();
            $text->text = $textFactory->text;
            $text->seo = $textFactory->seo;
            $text->save();
            return redirect()->route("referanslar")->withSuccess("Sayfanız başarıyla ilk hale dönmüştür");
        }
        $text = Page::where("tag","referanslar")->first();
        $text->text = $request["mytext"];
        $text->seo = $request["seo"];
        $text->update();
        return redirect()->route("referanslar")->withSuccess('Sayfanız başarıyla kaydedilmıştir');
    }


    public function getMevzuatlar(){

        $text = Page::where("tag","mevzuatlar")->first();
        $posts = Post::orderBy('id','desc')->paginate($this->paginate);
        $otherPosts = Post::inRandomOrder()->take(5)->get();
    
        $all = Post::get();
        $ar = array();
        foreach ($all as $i => $item) {
            $ar[$i]=$item->category_id;
        }
        $categories = Category::whereIn('id',$ar)->get();

        return view("mevzuatlar",["text"=>$text,'posts'=>$posts,'categories'=>$categories, 'otherPosts'=>$otherPosts]);
    }
    public function postMevzuatlar(Request $request){

        if($request["factory"]=="En ilk haline getir (geri getirilmez)"){
            $textFactory = Page::where("tag","mevzuatlarfactory")->first();
            $text = Page::where("tag","mevzuatlar")->first();
            $text->text = $textFactory->text;
            $text->seo = $textFactory->seo;
            $text->save();
            return redirect()->route("mevzuatlar")->withSuccess("Sayfanız başarıyla ilk hale dönmüştür");
        }
        $text = Page::where("tag","mevzuatlar")->first();
        $text->text = $request["mytext"];
        $text->seo = $request["seo"];
        $text->update();
        return redirect()->route("mevzuatlar")->withSuccess('Sayfanız başarıyla kaydedilmıştir');
    }
    public function getMevzuatlarByCategory($category){
        $category = ucfirst(strtolower(str_replace("_"," ",$category)));

        $text = Page::where("tag","mevzuatlar")->first();
        
        $cat = Category::where('text',$category)->first();
        if($cat){
            $posts = Post::where('category_id',$cat->id)->orderBy('id','desc')->paginate($this->paginate);
        }
        else return redirect()->route("mevzuatlar")->withWarning("Bu kategiriye göre bir şey bulunmadı");
        
        $otherPosts = Post::inRandomOrder()->take(5)->get();
        $categories = Category::get();
        return view("mevzuatlar",["text"=>$text,'posts'=>$posts,'categories'=>$categories, 'otherPosts'=>$otherPosts]);
    }

}

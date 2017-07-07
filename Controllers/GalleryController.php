<?php

namespace App\Http\Controllers;

use App\Hakkimizda;
use App\Gallery;
use App\Page;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class GalleryController extends Controller
{   

    public function getGallery(){
        //$text = Page::where("tag","gallery")->first();  
        $text = new Page;
        $text->seo = "Galeri";
        $galleries = Gallery::orderBy('id','desc')->get();

        return view("gallery",["text"=>$text,"galleries"=>$galleries]);
    }

    public function postAddToGallery(Request $request){
    	$gallery = new Gallery;
    	$gallery->image = $request['myimage'];
    	$gallery->save();
    	return redirect()->route("gallery");
    }
    public function getDeleteFromGallery($id){
    	$gallery = Gallery::where('id',$id)->first();
    	if($gallery){
    		$gallery -> delete();
    		return redirect()->route("gallery")->withSuccess("Fotoğraf başarıyla silinmiştir");
    	}
    	else{
    		return redirect()->route("gallery")->withWarning("Fotoğraf bulunmadı");
    	}

    }
}

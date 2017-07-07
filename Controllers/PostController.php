<?php
namespace App\Http\Controllers;
/**
* 
*/
use App\Post;
use App\Page;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Notifications\Notifiable;

class PostController extends Controller{
	
	public function getNewPost(){
		
		$categories = Category::get();

		$post = new Post;
		$post->seo = "";
		$post->body = "";
		$post->image= "";
		$post->category_id = 1;
		$post->id=0;

		return view("post", ["text"=>$post,"categories"=>$categories]);		
	}

	public function getChangePost($id){
		
		$categories = Category::get();

		$post = Post:: where('id',$id)->first();
		//return $post;
		if($post)
			return view("post", ["text"=>$post,"categories"=>$categories]);
		else
			return redirect()->route("mevzuatlar")->withWarning("Post bulunmadi");
	}

	public function postPost(Request $request){
		if($request['_id']==0){
			$post = new Post;
		}
		else{
			$post = Post::where('id',$request['_id'])->first();
		}

		$post->slug = str_slug( strtolower($request['title']), "-");
		$post->image = $request['myimage'];
		$post->title = $request['title'];
		$post->body = $request['mytext'];
		$post->seo = $request['seo'];
		
		$newcat=trim($request['newcategory']);
		if($newcat!=""){
			$category = new Category;
			
			$newcat = ucfirst(strtolower($newcat));

			$category->text = $newcat;
			$category->save();
			$post->category_id = $category->id;
		}
		else{
			$find_cat = Category::where('text',$request['selectcategory'])->first();
			if(!$find_cat)
				return back()->withWarning("Kategori bulunmadi");
			$post->category_id = $find_cat->id;
		}
		$post->save();
		return redirect()->route("mevzuatlar")->withSuccess("İşleminiz başarılıyla tamamlanmıştır");
	}
	public function getPostBySlug($slug){
		$post = Post::where('slug', $slug)->first();
		$otherPosts = Post::inRandomOrder()->take(5)->get();

		$all = Post::get();
        $ar = array();
        foreach ($all as $i => $item) {
            $ar[$i]=$item->category_id;
        }
        $categories = Category::whereIn('id',$ar)->get();

		if(!$post)
			return redirect()->route("home");

		return view("post-blog",["text"=>$post,"categories"=>$categories,'otherPosts'=>$otherPosts]);
	}

	public function getDeletePost($slug){
		$post = Post::where('slug', $slug)->first();
		if(!$post)
			return redirect()->route('home')->withWarning('Blog bulunmadi');
		else{
			$post->delete();
			return redirect()->route('home')->withSuccess('Blogunuz başarılıyla silinmiştir');
		}
	}
}

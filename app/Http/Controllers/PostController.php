<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Ingredient;
use Cloudinary;


class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->get()]);  
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    
        
    }
    
    public function show(Post $post)
    {
    return view('posts.show')->with(['post' => $post]);
 //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    
    public function store(Post $post,PostRequest $request)
{
   // dd($request);
    $input = $request['post'];
    $user_id = Auth::id();
    $input += ['user_id'=>$user_id,];
     $input += ['user_name'=>Auth::user()->name];
    // dd($input);
    //$user_id = "3";
    
    if($request->file('image')){ //画像ファイルが送られた時だけ処理が実行される
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_url' => $image_url];
        }

    $post->fill($input)->save();
    $post->ingredients()->attach($request['ingredient']);

    //dd($image_url);
    //dd($post);
    return redirect('/posts/' . $post->id);
}


public function edit(Post $post, Ingredient $ingredient)
{
    return view('posts.edit')->with(['post' => $post,'ingredients'=>$ingredient->get()]);
}
    
public function update(PostRequest $request, Post $post, Ingredient $ingredient)
{
    $input_post = $request['post'];
    $post->fill($input_post)->save();
    
    $input_ingredient =  $request['ingredient'];
    $post->ingredients()->detach();
//    foreach($input_ingredient as $input){
 //   $post=new Post;
  //  $post->get()->find($post_id);
    //$post=Post::find($post_id)->get();
    $post->ingredients()->attach($input_ingredient['ingredient']);
//}
    
    
    return redirect('/posts/' . $post->id);
}

public function delete(Post $post)
{
    $post->delete();
    return redirect('/');
}

public function create(Ingredient $ingredient)
{
    return view('posts.create')->with(['ingredients' => $ingredient->get()]);
}

public function creater($id){
    $posts=Post::where("user_id",$id)->get();
    //dd($posts);
    return view('categories.index')->with(["posts"=>$posts]);
}

}
?>
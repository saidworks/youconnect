<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['auth']);
    }
    public function index(){
        //$posts = Post::get(); // return all posts as laravel collection
        // to reduce queries for likes for each post we are going to eager load it with the appropriate relationship
        // "latest" = orderBy('created_at','desc')

        $posts = Post::latest()->with(['user','likes'])->paginate(20);
        return view('posts.index', ['posts' => $posts]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'body' => 'required'
        ]);
        $request->user()->posts()->create($request->only('body'));
        return back();
    }
    public function destroy(Post $post){
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }


}

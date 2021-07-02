<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        return view('posts.index');
    }
    public function store(Request $request){
        $this->validate($request,[
            'body' => 'required'
        ]);
        Post::create([
            'user-id' => auth()->user()->id,
            'body' => $request->body
        ]);
    }
}

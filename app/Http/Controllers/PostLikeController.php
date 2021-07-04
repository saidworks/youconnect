<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostLikeController extends Controller
{
    //N.B: we could have created a method in the Post controller but we split it up to make it easier to maintain and read
    public function store(Post $post){
    // method request
     //     $this->validate($request,[
    //         'post_id' => 'required',
    //     ]);
    //    $request->user()->post->likes()->create($request->only('post_id'));
        dd($post);

    }
}

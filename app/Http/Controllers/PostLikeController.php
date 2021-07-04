<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    //N.B: we could have created a method in the Post controller but we split it up to make it easier to maintain and read
    public function store(Post $post,Request $request){
    // method request
     //     $this->validate($request,[
    //         'post_id' => 'required',
    //     ]);
    //    $request->user()->post->likes()->create($request->only('post_id'));
    if(!$post->likedBy($request->user())){;
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);
        }
        return back();
    }
    public function destroy(Post $post,Request $request){
            //dd($post);
            $request->user()->likes()->where('post_id',$post->id)->delete();
            return back();
    }
}

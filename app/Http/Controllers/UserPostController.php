<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;


class UserPostController extends Controller
{
    public function index(User $user,Post $post){
        $posts = $user->posts()->with(['user','likes'])->paginate(20);
        return view('users.posts.index',[
            'user'=>$user,
            'posts'=> $posts,
        ]);
    }
}

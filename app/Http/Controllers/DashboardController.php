<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    //here you come from login redirect
    public function index(){
       // auth() helper for authetification we can use Auth facade as well
        //dd(auth()->user());
        //dd(auth()->user()->posts); // to return posts of authenticated user as a laravel collection
        //dd(Post::find(3)->created_at);
        return view('dashboard');
    }
}

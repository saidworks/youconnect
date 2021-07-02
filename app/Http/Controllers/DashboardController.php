<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('dashboard');
    }
}

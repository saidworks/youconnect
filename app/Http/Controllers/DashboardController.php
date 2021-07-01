<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //here you come from login redirect
    public function index(){
        return view('dashboard');
    }
}

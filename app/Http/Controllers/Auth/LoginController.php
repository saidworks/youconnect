<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{   
    
    public function __construct()
    {   
        //show if not signed in
        $this->middleware(['guest']);
    }
    public function index(){
       
        return view('auth.login');
    }
    public function store(Request $request){  
        // validate submitted form using the validate helper
            $this->validate($request,[
                'email'=> 'required|email',
                'password'=> 'required'
            ]);
        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('status','invalid login details');
        };
        return redirect()->route('dashboard');
    }
}

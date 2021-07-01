<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
        // validate submitted form using the validate helper
        $this->validate($request,[
            'name'=> 'required|max:255',
            'username'=> 'required|max:255',
            'email'=> 'required|email|max:255',
            'password'=> 'required|confirmed',
        ]);
        //use model method to store the data to the users table
        User::create([
            'name' => $request->name,
            'username' => $request->username,   
            'email' => $request->email,   
            'password' => Hash::make($request->password)
        ]
        );
        //sign in using auth helper
        auth()->attempt($request->only('email','password'));
        return redirect()->route('dashboard');
    }
}

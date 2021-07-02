<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
//home page
Route::get('/',function(){
   return view('home');
})->name('home');
//Dashboard 
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

//Auth
//register
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);
//login 
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
//logout
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

//Posts
Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::post('/posts',[PostController::class,'store']);

<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');


Route::get('register',[RegisterController::class,'index'])->name('register');
Route::post('register',[RegisterController::class,'store']);
Route::get('/', function () {
   return view('posts.index');
});

@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 mt-6 rounded-lg">
           <h1 class="mb-4 mt-4 text-center text-3xl">Register</h1> 
            <form action="{{ route('register') }}" method="POST"> 
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type='text' class="bg-gray-100 border-2 w-full p-4 rounded-lg" value='' name="name" id="name" placeholder="enter your name">
                </div>
                <div class="mb-4">
                    <label for="username" class="sr-only">Userame</label>
                    <input type='text' class="bg-gray-100 border-2 w-full p-4 rounded-lg" value='' name="username" id="username" placeholder="enter your name">
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type='email' class="bg-gray-100 border-2 w-full p-4 rounded-lg" value='' name="email" id="email" placeholder="enter your email">
                </div>
            </form>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 mt-6 rounded-lg">
           <h1 class="mb-4 mt-4 text-center text-3xl">Login</h1> 
           @if(session('status'))
           {{-- in case of bad login it return an error message --}}
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
           @endif
            <form action="{{ route('login') }}" method="POST"> 
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type='email' class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" name="email" id="email" placeholder="enter your email"  value='{{ old('email') }}'>
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div> 
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type='password' class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value='' name="password" id="password" placeholder="choose your password" value=''>
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="mb-4">
                    <input type="checkbox" class="mr-2" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-4 rounded font-medium w-full">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
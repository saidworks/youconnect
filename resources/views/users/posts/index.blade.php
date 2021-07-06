@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 mt-6 rounded-lg">
            <div class="font-bold mb-4">{{ $user->name }}</div>
            @foreach ($posts as $post)
                <div class="mb-4">
                <p class="mb-2">{{ $post->body }}</p>
                <span class='text-gray-600  text-sm'>{{ $post->created_at->diffForHumans() }}</span>
                </div>
                
            @endforeach
        </div>
    </div>
@endsection
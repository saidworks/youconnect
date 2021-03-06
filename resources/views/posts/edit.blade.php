@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 mt-6 rounded-lg">
            @auth
            <form action="{{ route('posts.update',$post) }}" method="POST" class='mb-4'>
                    @csrf
                    @method('PUT')
                    <div class='mb-4'>
                        <label for='body' class='sr-only'>Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" >{{ $post->body }}</textarea>
                        
                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-4 rounded font-medium w-full">Post</button>
                    </div>
                </form>
                @endauth
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 mt-6 rounded-lg">
           <form action="{{ route('posts') }}" method="POST" class='mb-4'>
                @csrf
                <div class='mb-4'>
                    <label for='body' class='sr-only'>Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>
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
            @if ($posts->count())
                @foreach ($posts as $post )
                    <div class="mb-4">
                        <a href="{{ route('users.posts',$post->user) }}" class='font-bold'>{{ $post->user->name }}</a> <span class='text-gray-600  text-sm'>{{ $post->created_at->diffForHumans() }}</span>
                        <p class="mb-2">{{ $post->body }}</p>
                        <div class="flex items-center">
                            @auth
                            @can('delete',$post)
                            <div>
                            <form action="{{ route('posts.destroy', $post) }}" method="post" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500"> Delete </button>
                            </form>
                             </div>
                             @endcan
                            
                          
                            @if(!$post->likedBy(auth()->user()))
                                <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-500">Like</button>
                                </form>
                            @else
                                {{-- we do not have delete method in forms we need to use laravel method spoffing --}}
                                <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500">Unlike</button>
                                </form>
                            @endif 
                            <span class="text-gray-600 text-sm">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                            @endauth
                        </div>
                        
                    </div>
                @endforeach
                {{ $posts->links() }}
            @else
                there are no posts
            @endif
        </div>
    </div>
@endsection
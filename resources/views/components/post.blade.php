@props(['post' => $post])
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
        <a class='font-bold pl-1' href="{{ route('posts.show', $post) }}"> show</a>
        <a class='font-bold pl-1' href="{{ route('posts.edit', $post) }}"> edit </a>
    </div>
    
</div>
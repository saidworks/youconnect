@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium">{{ $user->name }}</h1>
                <p> Posted {{ $posts->count()}} {{ Str::plural('post',$posts->count()) }} and
                received {{ $user->receivedLikes()->count()  }} {{ Str::plural('like',$posts->count()) }}</p>
            </div>
            <div class="bg-white p-6 mt-4 rounded-lg mb-1">
                @if ($posts->count())
                    @foreach ($posts as $post )
                        <x-post :post="$post" />
                    @endforeach
                    {{ $posts->links() }}
                @else
                    <p>{{ $user->name }} did not post anything yet</p>  
                @endif
            </div>
        </div>
    </div>
@endsection
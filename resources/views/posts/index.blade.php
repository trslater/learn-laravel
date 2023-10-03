@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('posts') }}" method="post">
                @csrf

                <label class="block mb-4">
                    <textarea class="bg-gray-100 p-4 border-2 w-full @error('body') border-red-600 @enderror"
                              name="body" cols="30" rows="5" placeholder="Write your post here...">{{ old('body') }}</textarea>
                    @error('body')
                    <span class="text-red-600 p-1">{{ $message }}</span>
                    @enderror
                </label>

                <button class="w-full bg-blue-600 text-white p-3 rounded-lg" name="post">Post</button>
            </form>

            <div>
                @if ($posts->count())
                <ol>
                    @foreach ($posts as $post)
                    <li class="mt-4">
                        <div class="text-xs">
                            Posted by <span>{{ $post->user->name }}</span>, <span>{{ $post->created_at->diffforhumans() }}</span>
                        </div>

                        <div>
                            {{ $post->body }}
                        </div>

                        <div class="flex items-center">
                            @if (!$post->isLikedBy(auth()->user()))
                            <form action="{{ route('posts.likes', $post) }}" method="post">
                                @csrf
                                <button class="bg-blue-600 text-white text-xs p-1 rounded-lg mr-1" name="like">Like</button>
                            </form>
                            @else
                            <form action="{{ route('posts.likes', $post) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="bg-blue-600 text-white text-xs p-1 rounded-lg" name="unlike">Unlike</button>
                            </form>
                            @endif
                            <div class="ml-1">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</div>
                        </div>
                    </li>
                    @endforeach

                    {{ $posts->links() }}
                </ol>
                @else
                No posts :(
                @endif
            </div>
        </div>
    </div>
@endsection

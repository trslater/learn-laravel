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

                <button class="w-full bg-blue-600 text-white p-4" name="login">Login</button>
            </form>

            <div>
                @if ($posts->count())
                <ol>
                    @foreach ($posts as $post)
                    <li class="mt-4">
                        <div class="text-xs">
                            Posted by <span>{{ $post->user->name }}</span>, <span>{{ $post->created_at->diffforhumans() }}</span>
                        </div>

                        <div class="p-3 border-2 border-solid border-gray-300">
                            {{ $post->body }}
                        </div>
                    </li>
                    @endforeach
                </ol>
                @else
                No posts :(
                @endif
            </div>
        </div>
    </div>
@endsection

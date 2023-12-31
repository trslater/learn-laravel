@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
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
            @endauth

            <div>
                @if ($posts->count())
                <ol>
                    @foreach ($posts as $post)
                    <li class="mt-5">
                        <x-post :post="$post" />
                    </li>
                    @endforeach

                    {{ $posts->links() }}
                </ol>
                @else
                No one has posted anything yet.
                @endif
            </div>
        </div>
    </div>
@endsection

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
        </div>
    </div>
@endsection

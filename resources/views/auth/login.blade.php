@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <form action="{{ route('login') }}" method="post">
                @csrf

                <label class="block mb-4">
                    <div>Email</div>
                    <input class="bg-gray-100 p-4 border-2 w-full @error('email') border-red-600 @enderror"
                           type="email" name="email" placeholder="Your email address" value="{{ old('email') }}">
                    @error('email')
                    <span class="text-red-600 p-1">{{ $message }}</span>
                    @enderror
                </label>
                
                <label class="block mb-4">
                    <div>Password</div>
                    <input class="bg-gray-100 p-4 border-2 w-full @error('password') border-red-600 @enderror"
                           type="password" name="password" placeholder="Your password">
                    @error('password')
                        <span class="text-red-600 p-1">{{ $message }}</span>
                    @enderror
                </label>
                
                <button class="w-full bg-blue-600 text-white p-4" name="login">Login</button>
            </form>
        </div>
    </div>
@endsection

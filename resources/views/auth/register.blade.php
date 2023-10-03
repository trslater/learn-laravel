@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" method="post">
                @csrf

                <label class="block mb-4">
                    <div>Name</div>
                    <input
                        class="bg-gray-100 p-4 border-2 w-full @error('name') border-red-600 @enderror"
                        type="text" name="name" id="name" placeholder="Your name" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-red-600 p-1">{{ $message }}</span>
                    @enderror
                </label>
                
                <label class="block mb-4">
                    <div>Email</div>
                    <input class="bg-gray-100 p-4 border-2 w-full @error('email') border-red-600 @enderror"
                           type="email" name="email" placeholder="Your email address" value="{{ old('email') }}">
                    @error('email')
                    <span class="text-red-600 p-1">{{ $message }}</span>
                    @enderror
                </label>
                
                <label class="block mb-4">
                    <div>Username</div>
                    <input class="bg-gray-100 p-4 border-2 w-full @error('username') border-red-600 @enderror"
                           type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                    @error('username')
                        <span class="text-red-600 p-1">{{ $message }}</span>
                    @enderror
                </label>
                
                <label class="block mb-4">
                    <div>Password</div>
                    <input class="bg-gray-100 p-4 border-2 w-full @error('password') border-red-600 @enderror"
                           type="password" name="password" placeholder="Choose a password">
                    @error('password')
                        <span class="text-red-600 p-1">{{ $message }}</span>
                    @enderror
                </label>
                
                <label class="block mb-4">
                    <div>Confirm password</div>
                    <input class="bg-gray-100 p-4 border-2 w-full"
                           type="password" name="password_confirmation" placeholder="Type the same password again">
                </label>
                
                <button class="w-full bg-blue-600 text-white p-4" name="register">Register</button>
            </form>
        </div>
    </div>
@endsection

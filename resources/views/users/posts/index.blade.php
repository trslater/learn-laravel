@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class="text-xl">{{ $user->name }}</h1>
            
            <div>
                @if ($posts->count())
                <ol>
                    @foreach ($posts as $post)
                    <li class="mt-5">
                        <x-post :post="$post"></x-post>
                    </li>
                    @endforeach

                    {{ $posts->links() }}
                </ol>
                @else
                {{ $user->name }} does not have any posts.
                @endif
            </div>
        </div>
    </div>
@endsection

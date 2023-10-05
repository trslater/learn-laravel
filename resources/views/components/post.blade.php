@props(['post' => $post])

<div>
    <div class="text-xs">
        Posted by <a href="{{ route('users.posts', $post->user) }}">{{ $post->user->name }}</a>, {{ $post->created_at->diffforhumans() }}
    </div>

    <a href="{{ route('posts.show', $post) }}" class="block">{{ $post->body }}</a>

    <div class="flex items-center">
        @if(auth()->user())
        @if (!$post->isLikedBy(auth()->user()))
        <form action="{{ route('posts.likes', $post) }}" method="post">
            @csrf
            <button class="bg-blue-600 text-white text-xs p-1 rounded-lg mr-1" name="like">Like</button>
        </form>
        @else
        <form action="{{ route('posts.likes', $post) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="bg-blue-600 text-white text-xs p-1 rounded-lg mr-1" name="unlike">Unlike</button>
        </form>
        @endif
        @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="bg-red-600 text-white text-xs p-1 rounded-lg mr-1" name="delete">Delete</button>
        </form>
        @endcan
        @endif
        <div>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</div>
    </div>
</div>

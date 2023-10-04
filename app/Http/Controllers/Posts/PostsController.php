<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() {
        return view('posts.index', [
            'posts' => Post::with(['user', 'likes'])->paginate(10),
        ]);
    }
    
    public function store(Request $request) {
        $this->validate($request, [
            'body' => ['required'],
        ]);

        $request->user()->posts()->create($request->only('body'));

        return redirect()->route('posts');
    }
    
    public function destroy(Post $post, Request $request) {
        if ($post->user != auth()->user()) {
            return response(null, 403);
        }

        $post->delete();

        return redirect()->route('posts');
    }
}

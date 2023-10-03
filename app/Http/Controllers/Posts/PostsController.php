<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() {
        return view('posts.index', [
            'posts' => Post::paginate(10),
        ]);
    }
    
    public function store(Request $request) {
        $this->validate($request, [
            'body' => ['required'],
        ]);

        $request->user()->posts()->create($request->only('body'));

        return redirect()->route('posts');
    }
}

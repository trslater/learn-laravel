<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() {
        return view('posts.index');
    }
    
    public function store(Request $request) {
        $this->validate($request, [
            'body' => ['required'],
        ]);

        $request->user()->posts()->create($request->only('body'));

        return redirect()->route('posts');
    }
}

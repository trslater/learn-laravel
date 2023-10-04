<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsLikesController extends Controller
{
    public function store(Post $post, Request $request) {
        if ($post->isLikedBy($request->user())) {
            return response(null, 409);
        }

        $post->likes()->create(['user_id' => $request->user()->id]);

        return redirect()->route('posts');
    }
    
    public function destroy(Post $post, Request $request) {
        $post->likes()->where('user_id', $request->user()->id)->deletE();

        return redirect()->route('posts');
    }
}

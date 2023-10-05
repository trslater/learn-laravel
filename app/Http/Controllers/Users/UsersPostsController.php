<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersPostsController extends Controller
{
    public function index(User $user) {
        $posts = $user->posts()->with(['user', 'likes'])->paginate(10);

        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}

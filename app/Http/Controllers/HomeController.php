<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        // get posts of people being followed
        $followingIds = Auth::user()->following->pluck('id')->toArray();
        $followingPosts = Post::whereIn('user_id', $followingIds)->latest()->paginate(20);
        // dd($followingPosts);
        return view('main', ['posts' => $followingPosts]);
    }
}

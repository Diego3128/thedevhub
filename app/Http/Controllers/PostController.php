<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
    public function index($username)
    {
        try {
            $user = User::where('username', $username)->firstOrFail();
            return view('dashboard', compact('user'));
        } catch (ModelNotFoundException $e) {
            return view('errors.user-not-found', compact('username'));
        }
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(CreatePostRequest $request)
    {
        Post::create([
            'title' => $request->title,
            'description' => $request->body,
            'image_path' => $request->image,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('post.index', ['username' => Auth::user()->username])->with('success', 'A new post was created.');
    }
}

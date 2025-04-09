<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index($username)
    {
        try {
            $user = User::where('username', $username)->firstOrFail();
            $posts = Post::where('user_id', $user->id)->paginate(30);
            return view('dashboard', compact('user', 'posts'));
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

    public function show(User $user, Post $post)
    {
        return view('posts.show', compact('post', 'user'));
    }

    public function destroy($post)
    {
        try {
            $post = Post::where('id', $post)->firstOrFail();
            Gate::authorize('delete', $post); //404 if it's not autorized
            $post->delete(); //image is deleted using a model event
            return redirect()->route('post.index', ['username' => Auth::user()->username])->with('success', 'Post deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('post.index', ['username' => Auth::user()->username])->with('error', 'The post could not be deleted.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Post $post)
    {
        $post->likes()->create([
            'user_id' => Auth::user()->id
        ]);

        return back();
    }

    public function destroy(Post $post)
    {
        if (Auth::user()->likes->where('post_id', $post->id)->isNotEmpty()) {
            Auth::user()->removeLike($post);
        }
        return back();
    }
}

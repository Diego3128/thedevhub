<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, User $user, Post $post)
    {
        // redirect with error if the post does not belong to the user
        if ($post->user->username !== $user->username) {
            return redirect()->back()->with('error', 'the comment was not created.');
        }
        // save comment
        Comment::create(
            [
                'comment' => $request->comment,
                'user_id' => Auth::user()->id,
                'post_id' => $post->id
            ]
        );
        // redirect back with a message
        return redirect()->back()->with('info', 'you have commented this post.');
    }
}

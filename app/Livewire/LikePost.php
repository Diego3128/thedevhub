<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likeCount;

    public function mount($post)
    {
        $this->isLiked = $post->checkLike(Auth::user());
        $this->likeCount = $post->likes()->count();
    }

    public function like()
    {
        // check if the user has liked the post
        if ($this->post->checkLike(Auth::user())) {
            // delete like
            $this->post->likes()->where('user_id', Auth::user()->id)->delete();
            $this->isLiked = false;
        } else {
            // like a post
            $this->post->likes()->create([
                'user_id' => Auth::user()->id
            ]);
            $this->isLiked = true;
        }
        $this->likeCount = $this->post->likes()->count();
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}

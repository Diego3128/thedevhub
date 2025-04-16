<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function store(User $user)
    {
        // Follower::create([
        //     'user_id' => $user->id,
        //     'follower_id' => Auth::user()->id
        // ]);
        $user->followers()->attach(Auth::user()->id);

        return back()->with('success', 'You now follow ' . $user->username);
    }

    public function destroy(User $user)
    {
        // $follower = Follower::where('user_id', $user->id)->where('follower_id', Auth::user()->id)->first();
        // $follower->delete();
        $user->followers()->detach(Auth::user()->id);
        return back()->with('info', 'You have unfollowed ' . $user->username);
    }
}

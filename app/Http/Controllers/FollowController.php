<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;
use App\Models\User;

class FollowController extends Controller
{
    public function follow($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        // Check if the user is already following
        if (Auth::user()->isFollowing($user->id)) {
            return redirect()->back()->with('status', 'You are already following this user.');
        }

        Follow::create([
            'follower_id' => Auth::id(),
            'following_id' => $user->id,
        ]);

        return redirect()->back()->with('status', 'You are now following ' . $user->username);
    }

    public function unfollow($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $follow = Follow::where('follower_id', Auth::id())
                        ->where('following_id', $user->id)
                        ->first();

        if ($follow) {
            $follow->delete();
        }

        return redirect()->back()->with('status', 'You have unfollowed ' . $user->username);
    }
}

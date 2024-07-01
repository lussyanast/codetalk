<?php

namespace App\Http\Controllers\My;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Discussion;
use App\Models\Answer;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->first();
        if (!$user) {
            return abort(404);
        }

        $picture = filter_var($user->picture, FILTER_VALIDATE_URL)
            ? $user->picture : Storage::url($user->picture);

        $perPage = 5;
        $columns = ['*'];
        $discussionsPageName = 'discussions';
        $answersPageName = 'answers';

        // Statistik aktivitas pengguna
        $totalDiscussions = Discussion::where('user_id', $user->id)->count();
        $totalAnswers = Answer::where('user_id', $user->id)->count();
        $totalLikes = $user->discussions->sum('likeCount') + $user->answers->sum('likeCount');

        // Followers and Following counts
        $followersCount = $user->followers()->count();
        $followingCount = $user->following()->count();

        return view('pages.users.show', [
            'user' => $user,
            'picture' => $picture,
            'discussions' => Discussion::where('user_id', $user->id)
                ->paginate($perPage, $columns, $discussionsPageName),
            'answers' => Answer::where('user_id', $user->id)
                ->paginate($perPage, $columns, $answersPageName),
            'totalDiscussions' => $totalDiscussions,
            'totalAnswers' => $totalAnswers,
            'totalLikes' => $totalLikes,
            'followersCount' => $followersCount,
            'followingCount' => $followingCount,
        ]);
    }

    public function edit($username) {
        $user = User::where('username', $username)->first();
    
        if (!$user || $user->id !== auth()->id()) {
            return abort(404);
        }
    
        $picture = filter_var($user->picture, FILTER_VALIDATE_URL)
            ? $user->picture 
            : Storage::url($user->picture);
    
        return view('pages.users.form', [
            'user' => $user,
            'picture' => $picture,
        ]);
    }

    public function update(UpdateRequest $request, $username) {
        \Log::info('Update method called');
        
        $user = User::where('username', $username)->first();
        if (!$user || $user->id !== auth()->id()) {
            return abort(404);
        }
    
        $validated = $request->validated();
    
        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }
    
        if ($request->hasFile('picture')) {
            \Log::info('Picture uploaded');
            
            if (filter_var($user->picture, FILTER_VALIDATE_URL) === false) {
                Storage::disk('public')->delete($user->picture);
            }
    
            $filePath = Storage::disk('public')->put('images/users/picture', request()->file('picture'));
            $validated['picture'] = $filePath;
        }
    
        $update = $user->update($validated);
    
        if ($update) {
            \Log::info('User updated successfully');
            session()->flash('notif.success', 'Your profile updated successfully!');
            return redirect()->route('users.show', $validated['username']);
        }
    
        \Log::error('Failed to update user');
        return abort(500);
    }
}

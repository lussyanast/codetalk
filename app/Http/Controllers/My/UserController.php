<?php

namespace App\Http\Controllers\My;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Pastikan model User diimport
use App\Models\Discussion; // Pastikan model Discussion diimport
use App\Models\Answer; // Pastikan model Answer diimport
use Illuminate\Support\Facades\Storage; // Untuk Storage facade
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    // get user berdasarkan username
    // cek apakah user dengan username tsb ada
    // jika tidak ada maka return page not found
    // buat var picture, bikin conditionalnya
    // cek apakah picture ini url,
    // kalau iya maka tampilkan langsung,
    // kalau bukan maka tampilkan dengan facade storage
    // get discussions berdasarkan id user dan get dengan paginasi per 5 row
    // get answers berdasarkan id user dan get dengan paginasi per 5 row
    // return view

    public function show($username){
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
        ]);
    }

    public function edit($username) {
        // get user berdasarkan username
        $user = User::where('username', $username)->first();
    
        // jika user tidak ada atau user id tidak sama dengan id milik user yang sedang login
        // maka return page not found
        if (!$user || $user->id !== auth()->id()) {
            return abort(404);
        }
    
        // Validate if the picture is a valid URL, if not get the storage URL
        $picture = filter_var($user->picture, FILTER_VALIDATE_URL)
            ? $user->picture 
            : Storage::url($user->picture);
    
        // return view
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

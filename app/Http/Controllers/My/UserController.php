<?php

namespace App\Http\Controllers\My;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Pastikan model User diimport
use App\Models\Discussion; // Pastikan model Discussion diimport
use App\Models\Answer; // Pastikan model Answer diimport
use Illuminate\Support\Facades\Storage; // Untuk Storage facade

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

        return view('pages.users.show', [
            'user' => $user,
            'picture' => $picture,
            'discussions' => Discussion::where('user_id', $user->id)
                ->paginate($perPage, $columns, $discussionsPageName),
            'answers' => Answer::where('user_id', $user->id)
                ->paginate($perPage, $columns, $answersPageName),
        ]);
    }
}

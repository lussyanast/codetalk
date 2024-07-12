<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUpRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function show() {
        return view('pages.auth.sign-up');
    }

    public function signUp(SignUpRequest $request) {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $validated['picture'] = config('app.avatar_generator_url') . $validated['username'];
        
        $create = User::create($validated);

        if ($create) {
            Auth::login($create);
            return redirect()->route('discussions.index');
        }

        return abort(500);
    }
}

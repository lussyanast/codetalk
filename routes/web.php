<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::namespace('App\Http\Controllers\Auth')->group(function() {
    Route::get('login', 'LoginController@show')->name('auth.login.show');
    Route::post('login', 'LoginController@login')->name('auth.login.login');
    Route::post('logout', 'LoginController@logout')->name('auth.login.logout');
    Route::get('signup', 'SignUpController@show')->name('auth.sign-up.show');
    Route::post('signup', 'SignUpController@signUp')->name('auth.sign-up.sign-up');
});

Route::get('discussions', function () {
    return view('pages.discussions.index');
})->name('discussions.index');

Route::get('discussions/show', function () {
    return view('pages.discussions.show');
})->name('discussions.show');

Route::get('discussions/create', function () {
    return view('pages.discussions.form');
})->name('discussions.create');

Route::get('answers/1', function () {
    return view('pages.answers.form');
})->name('answers.edit');

Route::get('users/lussyanast', function () {
    return view('pages.users.show');
})->name('users.show');

Route::get('users/lussyanast/edit', function () {
    return view('pages.users.edit');
})->name('users.edit');
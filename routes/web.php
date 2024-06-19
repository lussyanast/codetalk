<?php

use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AnswerController;

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

Route::get('faq', function() {
    return view('pages.faq');
})->name('pages.faq');

// Authentication Routes
Route::namespace('App\Http\Controllers\Auth')->group(function() {
    Route::get('login', [LoginController::class, 'show'])->name('auth.login.show');
    Route::post('login', [LoginController::class, 'login'])->name('auth.login.login');
    Route::post('logout', [LoginController::class, 'logout'])->name('auth.login.logout');
    Route::get('signup', [SignUpController::class, 'show'])->name('auth.sign-up.show');
    Route::post('signup', [SignUpController::class, 'signUp'])->name('auth.sign-up.sign-up');
});

// Protected Discussion Routes
Route::middleware('auth')->group(function() {
    Route::namespace('App\Http\Controllers\My')->group(function() {
        Route::resource('users', UserController::class)->only(['edit', 'update', 'show']);
    });

    Route::resource('discussions', DiscussionController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy']);
        Route::post('/discussions/{discussionSlug}/like', [LikeController::class, 'discussionLike'])->name('discussions.like.like');
        Route::post('/discussions/{discussionSlug}/unlike', [LikeController::class, 'discussionUnlike'])->name('discussions.like.unlike');

        Route::post('discussions/{discussion}/answer', [AnswerController::class, 'store'])->name('discussions.answer.store');

        Route::resource('answers', AnswerController::class)->only(['edit', 'update', 'destroy']);
        Route::post('/answers/{answer}/like', [LikeController::class, 'answerLike'])->name('answers.like.like');
        Route::post('/answers/{answer}/unlike', [LikeController::class, 'answerUnlike'])->name('answers.like.unlike');
});

Route::namespace('App\Http\Controllers')->group(function() {
    Route::get('/', 'HomeController@index')->name('pages.home');
    
    Route::resource('discussions', DiscussionController::class)->only(['index', 'show']);
    Route::get('discussions/categories/{category}', 'CategoryController@show')
        ->name('discussions.categories.show');
});

Route::namespace('App\Http\Controllers\My')->group(function() {
    Route::resource('users', UserController::class)->only(['show']);
});

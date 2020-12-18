<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

Route::get('/', function(PostController $postController) {
    $posts = collect($postController->get())->map(function($post) {
        $post->text = Str::substr($post->text, 0, 10) . '...';
        return $post;
    });

    return view('home', ['posts' => $posts]);
})->name('home');

Route::get('/post/{post}', function(PostController $postController, $postId) {
    $post = $postController->getOne($postId);
    return view('post', ['post' => $post]);
})->name('post');

Route::view('/login','login')->name('login');

Route::view('/register', 'register')->name('register')
    ->middleware('ensureoneuser')
    ->name('register');

Route::get('/dash', function(PostController $postController) {
    $posts = $postController->get();
    return view('dash', ['posts' => $posts]);
})->middleware('auth')->name('dash');

Route::get('/dash/edit/{post}', function(PostController $postController, $postId) {
    $post = $postController->getOne($postId);
    return view('dash-edit', ['post' => $post]);
})->middleware('auth')->name('edit post');

// Form actions

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register'])->middleware('ensureoneuser');

Route::patch('/posts/{post}', [PostController::class, 'update'])->middleware('auth');
Route::post('/posts', [PostController::class, 'new'])->middleware('auth');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function(){
    return redirect()->route('posts.index');
});

Route::group(['middleware'=>'auth'], function(){
    Route::resource('posts', PostController::class)->except(['index','show']);
});

Route::resource('posts', PostController::class)->only(['index', 'show']);

Route::get('/posts/bycat/{category}', [PostController::class, 'postsbyCategory'])->name('postsByCat');

require __DIR__.'/auth.php';

Route::resource('comments', CommentController::class);

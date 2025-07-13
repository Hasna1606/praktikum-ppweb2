<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CuitController;


Route::get('/', [CuitController::class, 'index'])->middleware('auth');;

Route::middleware('guest')->group(function ()
{
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::get('/register', function () {
        return view('register');
    })->name('register') ;

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//cuit post route
Route::post('/post', [CuitController::class, 'post'])->middleware('auth');

Route::get('/profil', function () {
    return view('profil');
});

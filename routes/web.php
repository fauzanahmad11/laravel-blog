<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'name' => 'Fauzan Gopar',
        'title' => 'Home',
        'active' => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "name" => "Royko",
        "gender" => "male",
        "specialis" => "coocking",
        "image" => "hero.jpg",
        'title' => 'About',
        'active' => 'about'
    ])->with('bapak', 'dimakassar');
});

Route::prefix('blog')->group(function () {
    Route::get('/posts', [PostController::class, 'index']);
    // halaman single post
    Route::get('posts/{post:slug}', [PostController::class, 'show']);
    // halaman single Category
    Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);
    Route::get('/categories ', [CategoryController::class, 'index']);
    Route::get('/authors/{author:username} ', [UserController::class, 'show']);
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');;
Route::post('/register', [RegisterController::class, 'store']);

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/posts/createSlug', [DashboardPostController::class, 'createSlug']);
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/posts', DashboardPostController::class);
    Route::get('/account/{id}', [RegisterController::class, 'edit']);
    Route::post('/account', [RegisterController::class, 'update']);
});

Route::prefix('dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('/categories', AdminCategoryController::class)->except('show');
    Route::get('/categories/createSlug', [AdminCategoryController::class, 'createSLug']);
});

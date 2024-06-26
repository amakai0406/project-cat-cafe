<?php

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FacilityController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');

//お問い合わせフォーム
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendMail']);
Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contact.complete');

//TOPページの設備から設備ページ
Route::get('/facilities', [FacilityController::class, 'index'])->name('facilities.index');

//管理画面
Route::prefix(('/admin'))
    ->name('admin.')
    ->group(function () {
        //ログイン時のみアクセス可能なルート
        Route::middleware('auth')
            ->group(function () {
            //ブログ
            Route::get('/blogs', [AdminBlogController::class, 'index'])->name('blogs.index');
            Route::get('/blogs/create', [AdminBlogController::class, 'create'])->name('blogs.create');
            Route::post('/blogs', [AdminBlogController::class, 'store'])->name('blogs.store');
            Route::get('/blogs/search', [AdminBlogController::class, 'search'])->name('blogs.search');
            Route::get('/blogs/{blog}/edit', [AdminBlogController::class, 'edit'])->name('blogs.edit');
            Route::put('/blogs/{id}', [AdminBlogController::class, 'update'])->name('blogs.update');
            Route::delete('/blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('blogs.destroy');
            Route::get('/blogs/showAll', [AdminBlogController::class, 'list'])->name('blogs.list');


            //ユーザ管理
            Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/users', [UserController::class, 'store'])->name('users.store');

            //猫管理
            Route::get('/cats', [CatController::class, 'index'])->name('cats.index');
            Route::get('/cats/create', [CatController::class, 'create'])->name('cats.create');
            Route::post('/cats', [CatController::class, 'store'])->name('cats.store');

            //設備管理
            Route::get('/facilities/create', [FacilityController::class, 'create'])->name('facilities.create');
            Route::post('/facilities', [FacilityController::class, 'store'])->name('facilities.store');


            //ログアウト
            Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        });


        //未ログイン時のみアクセス可能なルート
        Route::middleware('guest')
            ->group(function () {
            //ログイン
            Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
            Route::post('/login', [AuthController::class, 'login']);

        });

    });


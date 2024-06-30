<?php

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\MenuController;


use App\Http\Controllers\BlogController;


use App\Http\Controllers\FacilityController;
<<<<<<< HEAD
use App\Http\Controllers\FaqController;
=======

use App\Http\Controllers\UserCatController;



>>>>>>> main
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');

//お問い合わせフォーム

//contactにアクセスがあった場合、登録画面を表示
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
//クライアントが登録画面を入力後送信した際、DBにデータを保存
Route::post('/contact/sendMail', [ContactController::class, 'sendMail'])->name('contact.sendMail');
//完了画面の表示
Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contacts.complete');

//TOPページの設備から設備ページ
Route::get('/facilities', [FacilityController::class, 'index'])->name('facilities.index');

<<<<<<< HEAD
//TOPページのよくある質問から質問ページ
Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
=======
//TOPページねこちゃんたちからねこ一覧画面
Route::get('/cats', [UserCatController::class, 'index'])->name('cats.index');

//TOPページのブログからブログ一覧表示
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

//メニュー画面の表示
Route::get('/menus', [MenuController::class, 'index'])->name('index.menus');
>>>>>>> main

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


            //お問合せ管理
            Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
            Route::get('/contacts/show/{id}', [AdminContactController::class, 'show'])->name('contacts.show');

            //猫管理
            Route::get('/cats', [CatController::class, 'index'])->name('cats.index');
            Route::get('/cats/create', [CatController::class, 'create'])->name('cats.create');
            Route::post('/cats', [CatController::class, 'store'])->name('cats.store');

            //設備管理
            Route::get('/facilities/create', [FacilityController::class, 'create'])->name('facilities.create');
            Route::post('/facilities', [FacilityController::class, 'store'])->name('facilities.store');

            //質問管理
            Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
            Route::post('/faqs', [FaqController::class, 'store'])->name('faqs.store');



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


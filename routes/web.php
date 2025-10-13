<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('HomeController.index');

Route::get('/article', function () {
    return view('client.article');
});

Route::group(['prefix' => 'admin'], function() 
{
    Route::get('', function () {
        return view('admin.admin');
    })->name('dashboard');

    Route::get('/home', [HomeController::class, 'homeManeger'])->name('HomeController.homeManeger');
    Route::post('/home/hero', [HomeController::class, 'homeHeroStore'])->name('HomeController.homeHeroManage');
    Route::post('/home/special', [HomeController::class, 'homeSpecialStore'])->name('HomeController.homeSpecialStore');
    Route::post('/home/article', [HomeController::class, 'homeArticleStore'])->name('HomeController.homeArticleStore');

    Route::get('/category', function () {
        return view('admin.category');
    })->name('category');

    Route::get('/add', function () {
        return view('admin.add');
    });

    Route::get('/user', function () {
        return view('admin.user');
    })->name('users');
       
    Route::get('/add/user', function () {
        return view('admin.addUser');
    });

    Route::get('/add/image', function () {
        return view('admin.addImage');
    })->name('addImage');

    Route::get('/add/video', function () {
        return view('admin.addVideo');
    });

    Route::get('/video', function () {
        return view('admin.video');
    })->name('video');

    Route::get('/image', function () {
        return view('admin.image');
    })->name('iamge');

    Route::get('/comment', function () {
        return view('admin.comment');
    })->name('comment');
});

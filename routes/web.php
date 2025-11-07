<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedaiControler;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/check-ip', function () {
    return request()->ip();
});

Route::get('/test', function(){
    return view('test');
});

Route::get('/', [HomeController::class, 'index'])->name('HomeController.index');
Route::get('/show/{slug}', [CategoryController::class, 'showCategoryArticles'])->name('CategoryController.showCategoryArticles');
Route::get('/article/{id}', [ArticleController::class, 'showArticle'])->name('ArticleController.showArticle');


//.....................Login....................
Route::group(['prefix' => 'admin', 'middleware' => 'RestrictByIP'], function(){
    Route::get('/login', [UserController::class, 'loginPage'])->name('UserController.loginPage');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::post('/logout', [UserController::class, 'logout'])->name('UserController.logout');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'RestrictByIP']], function(){
    //....................Dashboard....................
    Route::get('', [DashboardController::class, 'dashboard'])->name('DashboardController.dashboard');

    Route::group(['middleware' => 'CheckWriter'], function(){
        //....................Home.Manager....................
        Route::group(['middleware' => 'CheckSuperAdmin'], function(){
            Route::get('/home', [HomeController::class, 'homeManeger'])->name('HomeController.homeManeger');
            Route::post('/home/hero', [HomeController::class, 'homeHeroStore'])->name('HomeController.homeHeroManage');
            Route::post('/home/special', [HomeController::class, 'homeSpecialStore'])->name('HomeController.homeSpecialStore');
            Route::post('/home/media', [HomeController::class, 'homeMediaStore'])->name('HomeController.homeMediaStore');
            Route::post('/home/content', [HomeController::class, 'homeContentStore'])->name('HomeController.homeContentStore');
            Route::post('/home/gallery', [HomeController::class, 'homeGalleryStore'])->name('HomeController.homeGalleryStore');
            Route::post('/home/article', [HomeController::class, 'homeArticleStore'])->name('HomeController.homeArticleStore');
            Route::post('/home/category', [HomeController::class, 'homeCategoryStore'])->name('HomeController.homeCategoryStore');
        });

        // /....................Categories.Manager....................
        Route::get('/category', [CategoryController::class, 'categoryManager'])->name('CategoryController.categoryManager');
        Route::group(['middleware' => 'CheckAdmin'], function(){
            Route::post('/add/category', [CategoryController::class, 'addCategoryManager'])->name('CategoryController.addCategoryManager');
            Route::post('/category/destroy', [CategoryController::class, 'deleteCategoryManager'])->middleware('CheckSuperAdmin')->name('CategoryController.deleteCategoryManager');
        });

        //....................Users.Manger....................
        Route::group(['middleware' => 'CheckSuperAdmin'], function(){
            Route::get('/user', [UserController::class, 'userManager'])->name('UserController.userManager');
            Route::get('/add/user', [UserController::class, 'addUserManager'])->name('UserController.addUserManager');
            Route::post('/add/user', [UserController::class, 'addUserStore'])->name('UserController.addUserStore');
            Route::get('/update/user/{id}', [UserController::class, 'updateUserManager'])->name('UserController.updateUserManager');
            Route::post('/update/user/{user}', [UserController::class, 'updateUserStore'])->name('UserController.updateUserStore');
            Route::post('/user/destroy', [UserController::class, 'deleteUserManager'])->name('UserController.deleteUserManager');
        });

        //....................Imahes.Manager....................
        Route::get('/image', [MedaiControler::class, 'ImageGallery'])->name('MedaiControler.ImageGallery');
        Route::group(['middleware' => 'CheckAdmin'], function(){
            Route::get('/add/image', [MedaiControler::class, 'ImageManager'])->name('MedaiControler.ImageManager');
            Route::post('/add/image', [MedaiControler::class, 'ImageStore'])->name('MedaiControler.ImageStore');
            Route::get('/update/image/{id}', [MedaiControler::class, 'UpdateImageManager'])->name('MedaiControler.UpdateImageManager');
            Route::post('/update/image/{image}', [MedaiControler::class, 'UpdateImageStore'])->name('MedaiControler.UpdateImageStore');
            Route::post('/delete/image/{image}', [MedaiControler::class, 'DestroyImage'])->middleware('CheckSuperAdmin')->name('MedaiControler.DestroyImage');
        });

        //....................Videos.Manager....................
        Route::get('/video', [MedaiControler::class, 'VideoGallery'])->name('MedaiControler.VideoGallery');
        Route::group(['middleware' => 'CheckAdmin'], function(){
            Route::get('/add/video', [MedaiControler::class, 'VideoManager'])->name('MedaiControler.VideoManager');
            Route::post('/add/video', [MedaiControler::class, 'VideoStore'])->name('MedaiControler.VideoStore');
            Route::get('/update/video/{id}', [MedaiControler::class, 'UpdateVideoManager'])->name('MedaiControler.UpdateVideoManager');
            Route::post('/update/video/{video}', [MedaiControler::class, 'UpdateVideoStore'])->name('MedaiControler.UpdateVideoStore');
            Route::post('/delete/video/{video}', [MedaiControler::class, 'DestroyVideo'])->middleware('CheckSuperAdmin')->name('MedaiControler.DestroyVideo');
        });

        //....................Articles.Manager....................
        Route::get('/article', [ArticleController::class, 'articleManager'])->name('ArticleController.articleManager');
        Route::get('/add', [ArticleController::class, 'addArticleManager'])->name('ArticleController.addArticleManager');
        Route::post('/add', [ArticleController::class, 'addArticleStore'])->name('ArticleController.addArticleStore');
        Route::get('/update/{id}', [ArticleController::class, 'updateArticleManager'])->name('ArticleController.updateArticleManager');
        Route::post('/update/{article}', [ArticleController::class, 'updateArticleStore'])->name('ArticleController.updateArticleStore');
        Route::post('/delete/{article}', [ArticleController::class, 'deleteArticleStore'])->middleware('CheckSuperAdmin')->name('ArticleController.deleteArticleStore');
    });
});

//....................404.Error....................
Route::fallback(function () {
    return response()->view('errors.error404', [], 404);
});

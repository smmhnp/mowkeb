<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedaiControler;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('HomeController.index');
Route::get('/show/{id}', [CategoryController::class, 'showCategoryArticles'])->name('CategoryController.showCategoryArticles');

Route::get('/article/{id}', [ArticleController::class, 'showArticle'])->name('ArticleController.showArticle');

Route::group(['prefix' => 'admin'], function(){
    Route::get('', [DashboardController::class, 'dashboard'])->name('DashboardController.dashboard');

    //....................Home.Manager....................
    Route::get('/home', [HomeController::class, 'homeManeger'])->name('HomeController.homeManeger');
    Route::post('/home/hero', [HomeController::class, 'homeHeroStore'])->name('HomeController.homeHeroManage');
    Route::post('/home/special', [HomeController::class, 'homeSpecialStore'])->name('HomeController.homeSpecialStore');
    Route::post('/home/article', [HomeController::class, 'homeArticleStore'])->name('HomeController.homeArticleStore');
    Route::post('/home/category', [HomeController::class, 'homeCategoryStore'])->name('HomeController.homeCategoryStore');

    // /....................Categories.Manager....................
    Route::get('/category', [CategoryController::class, 'categoryManager'])->name('CategoryController.categoryManager');
    Route::post('/add/category', [CategoryController::class, 'addCategoryManager'])->name('CategoryController.addCategoryManager');
    Route::post('/category/destroy', [CategoryController::class, 'deleteCategoryManager'])->name('CategoryController.deleteCategoryManager');

    //....................Users.Manger....................
    Route::get('/user', [UserController::class, 'userManager'])->name('UserController.userManager');
    Route::get('/add/user', [UserController::class, 'addUserManager'])->name('UserController.addUserManager');
    Route::post('/add/user', [UserController::class, 'addUserStore'])->name('UserController.addUserStore');
    Route::get('/update/user/{id}', [UserController::class, 'updateUserManager'])->name('UserController.updateUserManager');
    Route::post('/update/user/{user}', [UserController::class, 'updateUserStore'])->name('UserController.updateUserStore');
    Route::post('/user/destroy', [UserController::class, 'deleteUserManager'])->name('UserController.deleteUserManager');

    //....................Imahes.Manager....................
    Route::get('/image', [MedaiControler::class, 'ImageGallery'])->name('MedaiControler.ImageGallery');
    Route::get('/add/image', [MedaiControler::class, 'ImageManager'])->name('MedaiControler.ImageManager');
    Route::post('/add/image', [MedaiControler::class, 'ImageStore'])->name('MedaiControler.ImageStore');
    Route::get('/update/image/{id}', [MedaiControler::class, 'UpdateImageManager'])->name('MedaiControler.UpdateImageManager');
    Route::post('/update/image/{image}', [MedaiControler::class, 'UpdateImageStore'])->name('MedaiControler.UpdateImageStore');
    Route::post('/delete/image/{image}', [MedaiControler::class, 'DestroyImage'])->name('MedaiControler.DestroyImage');

    //....................Videos.Manager....................
    Route::get('/video', [MedaiControler::class, 'VideoGallery'])->name('MedaiControler.VideoGallery');
    Route::get('/add/video', [MedaiControler::class, 'VideoManager'])->name('MedaiControler.VideoManager');
    Route::post('/add/video', [MedaiControler::class, 'VideoStore'])->name('MedaiControler.VideoStore');
    Route::get('/update/video/{id}', [MedaiControler::class, 'UpdateVideoManager'])->name('MedaiControler.UpdateVideoManager');
    Route::post('/update/video/{video}', [MedaiControler::class, 'UpdateVideoStore'])->name('MedaiControler.UpdateVideoStore');
    Route::post('/delete/video/{video}', [MedaiControler::class, 'DestroyVideo'])->name('MedaiControler.DestroyVideo');

    //....................Articles.Manager....................
    Route::get('/article', [ArticleController::class, 'articleManager'])->name('ArticleController.articleManager');
    Route::get('/add', [ArticleController::class, 'addArticleManager'])->name('ArticleController.addArticleManager');
    Route::post('/add', [ArticleController::class, 'addArticleStore'])->name('ArticleController.addArticleStore');
    Route::get('/update/{id}', [ArticleController::class, 'updateArticleManager'])->name('ArticleController.updateArticleManager');
    Route::post('/update/{article}', [ArticleController::class, 'updateArticleStore'])->name('ArticleController.updateArticleStore');
    Route::post('/delete/{article}', [ArticleController::class, 'deleteArticleStore'])->name('ArticleController.deleteArticleStore');
});

//....................404.Error....................
Route::fallback(function () {
    return response()->view('errors.error404', [], 404);
});

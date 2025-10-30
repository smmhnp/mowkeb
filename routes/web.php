<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedaiControler;
use App\Http\Controllers\UserController;
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
    Route::post('/home/category', [HomeController::class, 'homeCategoryStore'])->name('HomeController.homeCategoryStore');

    Route::get('/category', [CategoryController::class, 'categoryManager'])->name('CategoryController.categoryManager');
    Route::post('/add/category', [CategoryController::class, 'addCategoryManager'])->name('CategoryController.addCategoryManager');
    Route::post('/category/destroy', [CategoryController::class, 'deleteCategoryManager'])->name('CategoryController.deleteCategoryManager');

    Route::get('/user', [UserController::class, 'userManager'])->name('UserController.userManager');
    Route::get('/add/user', [UserController::class, 'addUserManager'])->name('UserController.addUserManager');
    Route::post('/add/user', [UserController::class, 'addUserStore'])->name('UserController.addUserStore');
    Route::get('/update/user/{id}', [UserController::class, 'updateUserManager'])->name('UserController.updateUserManager');
    Route::post('/update/user/{user}', [UserController::class, 'updateUserStore'])->name('UserController.updateUserStore');
    Route::post('/user/destroy', [UserController::class, 'deleteUserManager'])->name('UserController.deleteUserManager');

    Route::get('/add', function () {
        return view('admin.add');
    });

    Route::get('/article', function () {
        return view('admin.article');
    });

    Route::get('/image', [MedaiControler::class, 'ImageGallery'])->name('MedaiControler.ImageGallery');
    Route::get('/add/image', [MedaiControler::class, 'ImageManager'])->name('MedaiControler.ImageManager');
    Route::post('/add/image', [MedaiControler::class, 'ImageStore'])->name('MedaiControler.ImageStore');
    Route::get('/update/image/{id}', [MedaiControler::class, 'UpdateImageManager'])->name('MedaiControler.UpdateImageManager');
    Route::post('/update/image/{image}', [MedaiControler::class, 'UpdateImageStore'])->name('MedaiControler.UpdateImageStore');
    Route::post('/delete/image/{image}', [MedaiControler::class, 'DestroyImage'])->name('MedaiControler.DestroyImage');

    Route::get('/video', [MedaiControler::class, 'VideoGallery'])->name('MedaiControler.VideoGallery');
    Route::get('/add/video', [MedaiControler::class, 'VideoManager'])->name('MedaiControler.VideoManager');
    Route::post('/add/video', [MedaiControler::class, 'VideoStore'])->name('MedaiControler.VideoStore');
    Route::get('/update/video/{id}', [MedaiControler::class, 'UpdateVideoManager'])->name('MedaiControler.UpdateVideoManager');
    Route::post('/update/video/{video}', [MedaiControler::class, 'UpdateVideoStore'])->name('MedaiControler.UpdateVideoStore');
    Route::post('/delete/video/{video}', [MedaiControler::class, 'DestroyVideo'])->name('MedaiControler.DestroyVideo');
});

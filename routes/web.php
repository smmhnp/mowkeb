<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.home');
});

Route::get('/article', function () {
    return view('client.article');
});

Route::group(['prefix' => 'admin'], function() 
{
    Route::get('', function () {
        return view('admin.admin');
    });

    Route::get('/add', function () {
        return view('admin.add');
    });

    Route::get('/user', function () {
        return view('admin.user');
    });
       
    Route::get('/add/user', function () {
        return view('admin.addUser');
    });

    Route::get('/category', function () {
        return view('admin.category');
    });

    Route::get('/add/image', function () {
        return view('admin.addImage');
    });

    Route::get('/add/video', function () {
        return view('admin.addVideo');
    });

    Route::get('/video', function () {
        return view('admin.video');
    });

    Route::get('/image', function () {
        return view('admin.image');
    });

    Route::get('/comment', function () {
        return view('admin.comment');
    });
       
    Route::get('/home', function () {
        return view('admin.home');
    });
});
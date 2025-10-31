<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Image;
use App\Models\User;
use App\Models\Video;

class DashboardController extends Controller
{
    public function dashboard(){
        $article = Article::count();
        $image = Image::count();
        $video = Video::count();
        $user = User::count();
        $count = ['article' => $article, 'image' => $image, 'video' => $video, 'user' => $user];
        $articles = Article::with('category', 'user', 'images', 'video')->latest()->take(10)->get();

        return view('admin.admin', compact('count', 'articles'));
    }
}

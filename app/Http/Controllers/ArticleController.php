<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function articleManager(){
        $articles = Article::with('category', 'user', 'images', 'video')->latest()->paginate(5);
        $count = Article::count();

        return view('admin.article', compact('articles', 'count'));
    }

    //............................................add.article............................................

    public function addArticleManager(){
        $categories = Categorie::all();
        $videos = Video::all();
        $images = Image::all();

        return view('admin.add', compact('categories', 'videos', 'images'));
    }

    public function addArticleStore(ArticleRequest $request){
        $validated = $request->validated();
        
        $article = Article::create([
            'name' => $validated['title'],
            'category_id' => $validated['category'],
            'content' => $validated['content'],
            'summery' => $validated['summary'],
            'tag' => $validated['tag'],
            'status' => $validated['status'],
            'video_id' => $validated['video'],
            'cover' => $validated['cover'],
            // 'user_id' => Auth::id()
            'user_id' => '1'
        ]);

        if (!empty($validated['images'])) {
            $article->images()->attach($validated['images']);
        }

        return redirect()->route('ArticleController.articleManager')->with('success', 'مقاله با موفقیت ایجاد شد.');
    }

}

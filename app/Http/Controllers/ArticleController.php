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

    public function showArticle($id){
        $article = Article::with([
            'category',
            'user',
            'video',
            'images' => function ($query) {
                $query->latest()->take(3);
            }
        ])->findOrFail($id);

        return view('client.article', compact('article'));
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

    //............................................upadate.article............................................

    public function updateArticleManager($id){
        $article = Article::with('category', 'user', 'images', 'video')->findOrFail($id);
        $categories = Categorie::all();
        $videos = Video::all();
        $images = Image::all();
        $currentImg = Image::where('url', $article->cover)->first();


        return view('admin.update', compact('article', 'categories', 'videos', 'images', 'currentImg'));
    }

    public function updateArticleStore(ArticleRequest $request, Article $article){
        $article->update([
            'name' => $request->title,
            'category_id' => $request->category,
            'content' => $request->content,
            'summery' => $request->summary,
            'tag' => $request->tag,
            'status' => $request->status,
            'video_id' => $request->video,
            'cover' => $request->cover,
            // 'user_id' => Auth::id(),
            'user_id' => '2'
        ]);

        if ($request->has('images')) {
            $article->images()->sync($request->images);
        }

        return redirect()->route('ArticleController.articleManager')->with('success', 'مقاله با موفقیت ویرایش شد');
    }

    //............................................delete.article............................................

    public function deleteArticleStore(Article $article){
        $article->images()->detach();
        $article->delete();
        
        return response()->json(['success' => true,]);
    }
}

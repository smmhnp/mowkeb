<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeHeroRequest;
use App\Http\Requests\HomeSpecialRequest;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\home\Hero;
use App\Models\home\Specail;
use App\Models\Image;
use App\Models\TempArticle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $hero = Hero::first();
        $special = Specail::first();
        $articleID = TempArticle::pluck('article_id');
        $articles = Article::with(['user', 'category'])->whereIn('id', $articleID)->get();
        $categorys = Categorie::take(4)->get();

        return view('client.home', ['hero' => $hero, 'special' => $special, 'articles' => $articles, 'categorys' => $categorys]);
    }

    public function homeManeger(){
        $images = Image::all();
        $hero = Hero::first();
        $special = Specail::first();
        $articles = Article::all();

        return view('admin.home', ['images' => $images, 'hero' => $hero, 'special' => $special, 'articles' => $articles]);
    }

    public function homeHeroStore(HomeHeroRequest $request){
        Hero::first()->update([
            'title' => $request->title,
            'sub_title' => $request->subTitle,
            'btn_text' => $request->btnText,
            'photo' => $request->photo
        ]);

        return redirect()->back()->with('success', 'قسمت هیرو با موفقیت بروز شد.'); 
    }

    public function homeSpecialStore(HomeSpecialRequest $request){
        Specail::first()->update([
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'قسمت خبر فوری با موفقیت بروز شد.'); 
    }

    public function homeArticleStore(Request $request){
        
        // dd($request);
        $request->validate([
            'article_ids' => 'required|array|min:2|max:6',
            'article_ids.*' => 'exists:articles,id'
        ], [
            'article_ids.max' => 'شما فقط می‌توانید حداکثر ۶ مقاله انتخاب کنید.',
            'article_ids.min' => 'شما فقط می‌توانید حداقل ۲ مقاله انتخاب کنید.',
            'article_ids.required' => 'هیچ مقاله‌ای انتخاب نشده است.',
        ]);


        $data = collect($request->article_ids)->map(fn($id) => [
            'article_id' => $id,
        ])->toArray();

        // dd($data);
        
        $recordes = TempArticle::all();

        foreach($recordes as $recorde){
            TempArticle::findOrFail($recorde->id)->delete();
        }

        foreach($data as $article){
            TempArticle::create([
                'article_id' => $article['article_id']
            ]);
        }

        return redirect()->back()->with('success', 'قسمت لیست اخبار با موفقیت بروز شد.'); 
    }
}

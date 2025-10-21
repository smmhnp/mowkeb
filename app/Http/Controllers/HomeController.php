<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeHeroRequest;
use App\Http\Requests\HomeSpecialRequest;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\home\Hero;
use App\Models\home\TempCetegories;
use App\Models\home\Specail;
use App\Models\Image;
use App\Models\TempArticle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //............................................send.data.to.home.page............................................

    public function index(){
        $hero = Hero::first();
        $special = Specail::first();
        $articleID = TempArticle::pluck('article_id');
        $articles = Article::with(['user', 'category'])->whereIn('id', $articleID)->get();
        $categories = Categorie::getTempCategories();

        return view('client.home', ['hero' => $hero, 'special' => $special, 'articles' => $articles, 'categories' => $categories]);
    }

    //............................................send.data.manage.home............................................

    public function homeManeger(){
        $images = Image::all();
        $hero = Hero::first();
        $special = Specail::first();
        $articles = Article::all();
        $categories = Categorie::all();

        return view('admin.home', ['images' => $images, 'hero' => $hero, 'special' => $special, 'articles' => $articles, 'categories' => $categories]);
    }

    //............................................set.data.for.hero.section............................................

    public function homeHeroStore(HomeHeroRequest $request){
        Hero::first()->update([
            'title' => $request->title,
            'sub_title' => $request->subTitle,
            'btn_text' => $request->btnText,
            'photo' => $request->photo
        ]);

        return redirect()->back()->with('success', 'قسمت هیرو با موفقیت بروز شد.'); 
    }

    //............................................set.data.for.special.section............................................

    public function homeSpecialStore(HomeSpecialRequest $request){
        Specail::first()->update([
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'قسمت خبر فوری با موفقیت بروز شد.'); 
    }

    //............................................set.data.for.article.section............................................

    public function homeArticleStore(Request $request){
        
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

    //............................................set.data.for.category.section............................................

    public function homeCategoryStore(Request $request){
        if(TempCetegories::first())
            TempCetegories::firstOrFail()->delete();

        TempCetegories::create([
            'first' => $request->first,
            'seconde' => $request->seconde,
            'third' => $request->third,
            'fourth' => $request->fourth
        ]);
                
        return redirect()->back()->with('success', 'قسمت دسته بندی با موفقیت بروز شد.'); 
    }
}

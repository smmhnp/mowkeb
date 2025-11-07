<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaregoryRequest;
use App\Http\Requests\ContentRequest;
use App\Http\Requests\HomeHeroRequest;
use App\Http\Requests\HomeSpecialRequest;
use App\Http\Requests\MediaRequest;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Content;
use App\Models\Gallery;
use App\Models\home\Hero;
use App\Models\home\TempCetegories;
use App\Models\home\Specail;
use App\Models\Image;
use App\Models\Media;
use App\Models\TempArticle;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //............................................send.data.to.home.page............................................

    public function index(){
        $hero = Hero::first();
        $special = Specail::first();
        $media = Media::with('video')->first();
        $content = Content::first();
        $gallery = Gallery::all();
        $categories = Categorie::getTempCategories();

        return view('client.home', compact('hero', 'special', 'media', 'content', 'gallery', 'categories'));
    }

    //............................................send.data.manage.home............................................

    public function homeManeger(){
        $images = Image::all();
        $hero = Hero::first();
        $special = Specail::first();
        $media = Media::first();
        $content = Content::first();
        $articles = Article::all();
        $categories = Categorie::all();
        $videos = Video::all();
        
        $tempGallery = Gallery::all();
        $gallery = [];
        foreach($tempGallery as $image){
            $gallery[] = $image->image;
        }

        return view('admin.home', compact('images' , 'hero', 'special', 'media', 'content', 'gallery', 'articles', 'categories', 'videos'));
    }

    //............................................set.data.for.hero.section............................................

    public function homeHeroStore(HomeHeroRequest $request){
        Hero::first()->update([
            'title' => $request->title,
            'sub_title' => $request->subTitle,
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

    //............................................set.data.for.media.section............................................

    public function homeMediaStore(MediaRequest $request){
        Media::first()->update([
            'video_id' => $request->video,
            'first' => $request->first_poster,
            'second' => $request->second_poster,
            'third' => $request->third_poster
        ]);

        return redirect()->back()->with('success', 'قسمت ویدیو و پوسترها با موفقیت بروز شد.'); 
    }

    //............................................set.data.for.content.section............................................

    public function homeContentStore(ContentRequest $request){
        Content::first()->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->back()->with('success', 'قسمت محتوا با موفقیت بروز شد.'); 
    }
    
    //............................................set.data.for.gallery.section............................................

    public function homeGalleryStore(Request $request){

        Gallery::truncate();

        foreach($request->gallery as $image){
            Gallery::create([
                'image' => $image
            ]);
        }

        return redirect()->back()->with('success', 'قسمت گالری با موفقیت بروز شد.'); 
    }

    //............................................set.data.for.category.section............................................

    public function homeCategoryStore(CaregoryRequest $request){

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

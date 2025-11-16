<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryContent;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Video;
use Illuminate\Http\Request;
use Psy\Command\WhereamiCommand;

class CategoryController extends Controller
{
    public function categoryManager(){
        $categories = Categorie::all();

        return view('admin.category', ['categories' => $categories]);
    }

    //............................................add.category............................................

    public function addCategoryManager(){
        $videos = Video::all();

        return view('admin.addCategory', compact('videos'));
    }

    public function CategoryStoreManager(categoryContent $request){
    
        Categorie::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'video_id' => $request['video'],
            'content' => $request['content']
        ]);

        return redirect()->route('CategoryController.categoryManager')->with('success', 'دسته بندی با موفقیت اضافه شد');
    }

    //............................................update.category............................................

    public function updateCategoryManager($slug){
        $category = Categorie::where('slug', $slug)->with('video')->first();
        $videos = Video::all();

        return view('admin.updateCategory', compact('category', 'videos'));
    }

    public function updateCategoryStore(categoryContent $request, Categorie $category){
        $category->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'video_id' => $request['video'],
            'content' => $request['content']
        ]);

        return redirect()->route('CategoryController.categoryManager')->with('success', 'دسته بندی با موفقیت ویرایش شد');
    }
    //............................................delete.category............................................

    public function deleteCategoryManager(Request $request){
        Categorie::findOrFail($request->catrgory_id)->delete();
        return redirect()->back();
    }

    //............................................show.articles............................................

    public function showCategoryArticles($slug){
        $articles = Article::with('user', 'category')
            ->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->latest()->paginate(15);

        $content = Categorie::where('slug', $slug)->first();

        return view('client.categoryArticle', compact('articles', 'content'));
    }
}

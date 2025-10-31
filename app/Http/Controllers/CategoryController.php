<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Psy\Command\WhereamiCommand;

class CategoryController extends Controller
{
    public function categoryManager(){
        $categories = Categorie::all();

        return view('admin.category', ['categories' => $categories]);
    }

    //............................................add.category............................................

    public function addCategoryManager(Request $request){
        $request = $request->validate([
            'name' => 'required|string|max:20',
            'slug' => 'required|string|min:10',
        ],[
            'name.required' => 'لطفاً عنوان را وارد کنید.',
            'title.max' => 'عنوان نباید بیشتر از 20 کاراکتر باشد.',
            'slug.required' => 'لطفاً آدرس را وارد کنید.',
            'slug.min' => 'آدرس نباید کمکتر از 10 کاراکتر باشد',
        ]);

        Categorie::create([
            'name' => $request['name'],
            'slug' => $request['slug']
        ]);

        return redirect()->back();
    }

    //............................................delete.category............................................

    public function deleteCategoryManager(Request $request){
        Categorie::findOrFail($request->catrgory_id)->delete();
        return redirect()->back();
    }

    //............................................show.articles............................................

    public function showCategoryArticles($id){
        $articles = Article::with('user', 'category')->where('category_id', $id)->latest()->paginate(15);

        return view('client.categoryArticle', compact('articles'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryManager(){
        $categories = Categorie::all();

        return view('admin.category', ['categories' => $categories]);
    }

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

    public function deleteCategoryManager(Request $request){
        Categorie::findOrFail($request->catrgory_id)->delete();
        return redirect()->back();
    }
}

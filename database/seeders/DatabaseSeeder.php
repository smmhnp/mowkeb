<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Image;
use App\Models\User;
use App\Models\Video;
use App\Models\Comment;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::create([
        //     'fname' => 'Ali',
        //     'lname' => 'alavi',
        //     'username' => 'aliii',
        //     'email' => 'ali@gmail.com',
        //     'password' => '1234',
        //     'role' => 'admin',
        //     'status' => 'active'
        // ]);

        // Categorie::create([
        //     'name' => 'Art', 'slug' => 'art'
        // ]);

        // $videos = Video::create([
        //     'name' => "Sample Video",
        //     'aparatID' => "vid",
        //     'link' => "https://www.aparat.com/video"
        // ]);

        // $images = Image::create([
        //     'name' => "Sample Image",
        //     'alt' => "Image",
        //     'description' => "Description for image ",
        //     'url' => "https://example.com/images.jpg"
        // ]);

        // $users = User::all();
        // $categories = Categorie::all();

        // $article = Article::create([
        //     'name' => "Sample Article",
        //     'content' => "This is the content of sample article",
        //     'status' => 'published',
        //     'view' => rand(0, 500),
        //     'user_id' => $users->random()->id,
        //     'category_id' => $categories->random()->id,
        //     'video_id' => $videos->id,
        //     'cover' => $images->id,
        // ]);

        // $article->images()->attach([
        //     $images->id,
        //     $images->id
        // ]);        
        
        User::factory(15)->create();
        Categorie::factory(6)->create();
        Video::factory(10)->create();
        Image::factory(10)->create();
        Article::factory(20)->create();
        Comment::factory(10)->create();


        $articles = Article::all();
        $images = Image::all();

        foreach ($articles as $article) {
            $article->images()->attach(
                $images->random(2)->pluck('id')->toArray()
            );
        }
    }
}

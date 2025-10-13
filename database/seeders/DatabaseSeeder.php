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
    public function run(): void
    {
        // ----------------------------
        // Users
        // ----------------------------
        $usersData = [
            [
                'fname' => 'Ali',
                'lname' => 'alavi',
                'username' => 'aliii',
                'email' => 'ali@gmail.com',
                'password' => '1234',
                'role' => 'admin',
                'status' => 'active'
            ],
            [
                'fname' => 'hasan',
                'lname' => 'hasani',
                'username' => 'hasan',
                'email' => 'hasan@gmail.com',
                'password' => '1234',
                'role' => 'admin',
                'status' => 'active'
            ],
            [
                'fname' => 'ahmad',
                'lname' => 'ahmadi',
                'username' => 'ahmad',
                'email' => 'ahmad@gmail.com',
                'password' => '1234',
                'role' => 'writter',
                'status' => 'active'
            ],
            [
                'fname' => 'mohammad',
                'lname' => 'mohammadi',
                'username' => 'mohammad',
                'email' => 'mohammad@gmail.com',
                'password' => '1234',
                'role' => 'user',
                'status' => 'active'
            ]
        ];

        foreach ($usersData as $user) {
            User::create($user); // password خودش هش می‌شود و created_at/updated_at خودکار ست می‌شوند
        }

        $users = User::all();

        // ----------------------------
        // Categories
        // ----------------------------
        $categoriesData = [
            ['name' => 'موکب‌مغازه‌ای', 'slug' => '#'],
            ['name' => 'موکب‌ماشینی', 'slug' => '##'],
            ['name' => 'موکب‌قرآنی', 'slug' => '###'],
            ['name' => 'کارناوال', 'slug' => '####'],
        ];

        foreach ($categoriesData as $cat) {
            Categorie::create($cat);
        }

        $categories = Categorie::all();

        // ----------------------------
        // Videos
        // ----------------------------
        $videosData = [
            ['name' => '‌ویدیو تست', 'aparatID' => 'vid', 'link' => 'https://www.aparat.com/video'],
            ['name' => '1ویدیو تست', 'aparatID' => 'vid', 'link' => 'https://www.aparat.com/video'],
            ['name' => '‌ویدیو تست2', 'aparatID' => 'vid', 'link' => 'https://www.aparat.com/video'],
            ['name' => '‌ویدیو تست3', 'aparatID' => 'vid', 'link' => 'https://www.aparat.com/video'],
        ];

        foreach ($videosData as $video) {
            Video::create($video);
        }

        // ----------------------------
        // Images
        // ----------------------------
        $imagesData = [
            [
                'name' => 'تصویر تست',
                'alt' => 'Image',
                'description' => 'Description for image',
                'url' => 'https://images.unsplash.com/photo-1586339949216-35c2747cc36d?w=300&h=200&fit=crop'
            ],
            [
                'name' => '1تصویر تست',
                'alt' => 'Image',
                'description' => 'Description for image',
                'url' => 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=300&h=200&fit=crop'
            ],
            [
                'name' => '2تصویر تست',
                'alt' => 'Image',
                'description' => 'Description for image',
                'url' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=300&h=200&fit=crop'
            ],
            [
                'name' => '3تصویر تست',
                'alt' => 'Image',
                'description' => 'Description for image',
                'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTeQ9-41p-SXbTU6pj1HBWTbxrNuaSStGGBBQ&s'
            ],
        ];

        foreach ($imagesData as $img) {
            Image::create($img);
        }

        // ----------------------------
        // Articles
        // ----------------------------
        $videos = Video::all();

        $articlesData = [
            [
                'name' => 'خبر تست',
                'content' => 'این متن به عنوان تست وارد شده استاین متن به عنوان تست وارد شده استاین متن به عنوان تست وارد شده استاین متن به عنوان تست وارد شده است',
                'summery' => 'این متن به عنوان تست وارد شده است',
                'tag' => 'normal',
                'status' => 'allow',
                'view' => rand(0,500),
                'user_id' => $users->random()->id,
                'category_id' => $categories->random()->id,
                'video_id' => $videos->random()->id,
                'cover' => 'url'
            ],
            [
                'name' => '1خبر تست',
                'content' => 'این متن به عنوان تست وارد شده استاین متن به عنوان تست وارد شده استاین متن به عنوان تست وارد شده استاین متن به عنوان تست وارد شده است',
                'summery' => 'این متن به عنوان تست وارد شده است',
                'tag' => 'special',
                'status' => 'unauthorized',
                'view' => rand(0,500),
                'user_id' => $users->random()->id,
                'category_id' => $categories->random()->id,
                'video_id' => $videos->random()->id,
                'cover' => 'url'
            ],
            [
                'name' => '2خبر تست',
                'content' => 'این متن به عنوان تست وارد شده استاین متن به عنوان تست وارد شده استاین متن به عنوان تست وارد شده استاین متن به عنوان تست وارد شده است',
                'summery' => 'این متن به عنوان تست وارد شده است',
                'tag' => 'special',
                'status' => 'allow',
                'view' => rand(0,500),
                'user_id' => $users->random()->id,
                'category_id' => $categories->random()->id,
                'video_id' => $videos->random()->id,
                'cover' => 'url'
            ],
            [
                'name' => '3خبر تست',
                'content' => 'این متن به عنوان تست وارد شده استاین متن به عنوان تست وارد شده استاین متن به عنوان تست وارد شده استاین متن به عنوان تست وارد شده است',
                'summery' => 'این متن به عنوان تست وارد شده است',
                'tag' => 'special',
                'status' => 'unauthorized',
                'view' => rand(0,500),
                'user_id' => $users->random()->id,
                'category_id' => $categories->random()->id,
                'video_id' => $videos->random()->id,
                'cover' => 'url'
            ],
        ];

        foreach ($articlesData as $article) {
            Article::create($article);
        }
    }
}

      
        
// User::factory(15)->create();
// Categorie::factory(6)->create();
// Video::factory(10)->create();
// Image::factory(10)->create();
// Article::factory(20)->create();
// Comment::factory(10)->create();


// $articles = Article::all();
// $images = Image::all();

// foreach ($articles as $article) {
//     $article->images()->attach(
//         $images->random(2)->pluck('id')->toArray()
//     );
// }


<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Like;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $images = [
            ['images' => '/photo/profile1.jpg', 'user_id'=> 1 ],
            ['images' => '/photo/profile2.jpg', 'user_id'=> 2 ],
            ['images' => '/photo/profile3.jpg', 'user_id'=> 3 ],
            ['images' => '/photo/profile4.jpg', 'user_id'=> 4 ],
            ['images' => '/photo/profile5.jpg', 'user_id'=> 5 ],
            ['images' => '/photo/profile6.jpg', 'user_id'=> 6 ],
            ['images' => '/photo/profile7.jpg', 'user_id'=> 7 ],
            ['images' => '/photo/profile8.jpg', 'user_id'=> 8 ],
            ['images' => '/photo/profile9.jpg', 'user_id'=> 9 ],
            ['images' => '/photo/profile10.jpg', 'user_id'=> 10 ],
            ['images' => '/photo/profile11.jpg', 'user_id'=> 11 ],
        ];

        foreach ($images as $image) {
            Image::create($image);
        }
    
       

      
    

        $categorys = [
            ['name'=>'Web'],
            ['name'=>'Mobile'],
            ['name'=>'News'],
            ['name'=>'Tech']
        ];
        foreach ($categorys as $category) {
            Category::create($category);
        }



        Article::factory()->count(30)->create();
        Comment::factory()->count(70)->create();
        Like::factory()->count(100)->create();
        
   


        User::factory()->count(10)->create();
        
    }
}

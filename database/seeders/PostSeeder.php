<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\facades\File;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $posts = collect([
        //     [
        //         'title'=>'Post one',
        //         'slug'=>'Post slug one',
        //         'excerpt'=>'excerpt one',
        //         'description'=>'Post description one',
        //         'is_published'=>true,
        //         'min_to_read'=>5
        //     ],
        //     [
        //         'title'=>'Post two',
        //         'slug'=>'Post slug two',
        //         'excerpt'=>'excerpt two',
        //         'description'=>'Post description two',
        //         'is_published'=>true,
        //         'min_to_read'=>5
        //     ]
        // ]);
        // $posts->each(function($val){
        //     //Post::insert($val);

        //     Post::create([
        //         'title'=>$val['title'],
        //         'slug'=>$val['slug'],
        //         'excerpt'=>$val['excerpt'],
        //         'description'=>$val['description'],
        //         'is_published'=>$val['is_published'],
        //         'min_to_read'=>$val['min_to_read']
        //     ]);
        // });


        //include Json file
        $json = File::get('database/json/posts.json');

        $posts = collect(json_decode($json));

        $posts->each(function($val){
            //Post::insert($val);

            Post::create([
                'title'=>$val->title,
                'slug'=>$val->slug,
                'excerpt'=>$val->excerpt,
                'description'=>$val->description,
                'is_published'=>$val->is_published,
                'min_to_read'=>$val->min_to_read
            ]);
        });

        //Post::factory(5)->create();
        // Post::create([
        //     'title'=>'Post one',
        //     'slug'=>'Post slug one',
        //     'excerpt'=>'excerpt one',
        //     'description'=>'Post description one',
        //     'is_published'=>true,
        //     'min_to_read'=>5
        // ]);
    }
}

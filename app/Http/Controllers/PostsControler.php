<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;

class PostsControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //one to many relation
       /* $user = User::find(17);

        foreach($user->posts as $post){
            echo "Title $post->title". "<br>";
        }*/

        //many to many
        /*$tagIds= [1,2,3];

        $post= Post::find(1001);

        //add $tag ids on post_tags table for selected post
        $post->tags()->attach($tagIds);*/

        $posts= Post::with('tags')->get();

        dd($posts);


        //
        /*$posts= DB::table('posts')
        ->select('description','excerpt as exxx')
        ->get();*/

        /*Distinct example */
        /*$posts= DB::table('posts')
        ->select('is_published')
        ->distinct()
        ->get();*/

        /*Add select method example */
        /*$posts= DB::table('posts')
        ->select('user_id')->distinct();

        //get method
        $added = $posts->addSelect('is_published')->distinct()->get();*/

        //first method
        //->where(column:'id",operator:1000)

        /*get and first deference */
       /* $posts = DB::table('posts')
        ->where('id',1000)
        ->get();

        foreach($posts as $key =>$val ){
            print_r($val->description)."  -  ";
        }

        $posts = DB::table('posts')
        ->where('id',1000)
        ->first();

        dd($posts->description)

        */

        //value() method and it's use for single record retrive only
       /* $posts = DB::table('posts')
        ->where('id',1000)
        ->value('description');*/

        //find() method is used to retrive data from primary key
       /* $posts = DB::table('posts')
        ->find(1000);

        dd($posts->description);*/

        //pluck() method
        /*$posts= DB::table('posts')
        ->pluck('title');


        dd($posts);*/

        //transaction function
        /*DB::transaction(function () {
            DB::table('users')
            ->where('id',1)
            ->decrement('balance',20);

            DB::table('users')
            ->where('id',2)
            ->increment('balance',10);
        });*/

        //chunk() method retrieve large number of data in small part
        /*$posts= DB::table('posts')
        ->orderBy('id')
        ->chunk(10,function($posts){
            foreach($posts as $val){
                echo ($val->title);
            }
        });*/

        //fulltext method
        /*$posts= DB::table('posts')
        ->whereFullText('description','delectus')
        ->orwherefulltext('description','Vero')
        ->get();*/

        //reorder and orderBy
        /*$posts = DB::table('posts')
        ->orderBy('is_published');

        $reorder = $posts->reorder('title','desc')->get();

        dd($reorder);*/

        //pagination

       /* $posts= DB::table('posts')
        ->paginate(5);
        //->paginate(5,['*'], 'p');

        //simple pagination
        $posts = DB::table('posts')
        ->simplePaginate(5);

        return view('posts.index',compact('posts'));*/

       /* $posts= Post::create([
            'user_id'=>11,
            'title'=>'Replcate five',
            'slug'=>'replicate-five',
            'excerpt'=>'test',
            'description'=>'This is testing',
            'is_published'=>false,
            'min_to_read'=>10
        ]);

        $posts->replicate()->fill([
            'title'=>'REPLICATE!!',
            'slug'=>'replicate-five-'
        ]);
        dd($posts);
        $posts->save();*/

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

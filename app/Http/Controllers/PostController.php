<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    #Read
    public function index (){
        $post = Post::where('is_published',0)->first();
        dump($post);
        dd('end');
    }

    #Create
    public function create(){
        $postsArr = [
            [
                'title' => 'title of post from phpstorm',
                'content' => 'some interesting content',
                'image' => 'imageexample.jpg',
                'likes' => '20',
                'is_published' => '1',
            ],
            [
                'title' => 'another title of post from phpstorm',
                'content' => 'another some interesting content',
                'image' => 'anotherimageexample.jpg',
                'likes' => '50',
                'is_published' => '1',
            ],
        ];
        foreach ($postsArr as $item) {
            Post::create($item);
        }
        dd('created');
    }

    #Update
    public function update (){
        $post = Post::find(6);
        $post->update([
            'title' => 'update',
            'content' => 'update',
            'image' => 'update',
            'likes' => 111,
            'is_published' => 1,
        ]);
        dd('updated');
    }

    #Delete
    public function delete(){
        $post = Post::find(2);
        $post->delete();
        dd('deleted');
    }

# To restore SoftDeleted Data from db
//    public function delete(){
//        $post = Post::withTrashed()->find(2);
//        $post->restore();
//        dd('restored');
//    }

    #FirstOrCreate
    public function firstOrCreate(){
        $post=Post::find(1);
        $anotherPost = [
                'title' => 'some post',
                'content' => 'some content',
                'image' => 'someimage.jpg',
                'likes' => 50000,
                'is_published' => 1,
        ];
        $post = Post::firstOrCreate(['title'=>'some title phpstorm'],
            [
                'title' => 'some title phpstorm',
                'content' => 'some content',
                'image' => 'someimage.jpg',
                'likes' => 50000,
                'is_published' => 1,
            ]);
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate(){
        $anotherPost = [
            'title' => 'updateorcreate some post',
            'content' => 'updateorcreate some content',
            'image' => 'updateorcreate someimage.jpg',
            'likes' => 132,
            'is_published' => 1,
        ];
        $post = Post::updateOrCreate(['title'=>'some not a post'],
            [
            'title' => 'some post',
            'content' => 'created some content',
            'image' => 'reated someimage.jpg',
            'likes' => 321,
            'is_published' => 1,
            ]
        );
        dd($post->content);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    #Read
    public function index (){
        $posts = Post::all();
        return view('post.index',compact('posts'));
    }

    #Create
    public function create(){
        return view('post.create');
    }
    public function store(){
        $data = request()->validate([
            'title'=>'string',
            'content'=>'string',
            'image'=>'string'
        ]);
       Post::create ($data);
       return redirect()->route('post.index');
    }

    public function show(Post $post){
        return view('post.show', compact('post'));
    }
//    public function show($id){
//        $post = Post::findOrFail($id);
//        dd($post->title);
//    }


    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }
    #Update
    public function update (Post $post){
        $data = request()->validate([
            'title'=>'string',
            'content'=>'string',
            'image'=>'string'
        ]);
       $post->update($data);
        return redirect()->route('post.show', $post->id);
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
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

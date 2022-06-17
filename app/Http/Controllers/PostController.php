<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    #Read
    public function index (){
        ###Last Version
        $posts = Post::all();
        return view('post.index', compact('posts'));

        #without categories
//        $posts = Post::all();
//        return view('post.index',compact('posts'));

          #category added
//        $category = Category::find(1);
//        $post = Post::find(1);
//        dd($post->category);
        #Tags Added
//        $post = Post::find(1);
//        $tag = Tag::find(1);
//        dd($tag->posts);

    }

    #Create
    public function create(){
        $categories = Category::all();
        $tags=Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }
    public function store(){
        $data = request()->validate([
            'title'=>'required|string',
            'content'=>'string',
            'image'=>'string',
            'category_id' => '',
            'tags' => ''
        ]);

        $tags = $data[ 'tags'];
        unset($data['tags']);

       $post = Post::create ($data);
        $post->tags()->attach($tags);
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
        $categories = Category::all();
        $tags=Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }
    #Update
    public function update (Post $post){
        $data = request()->validate([
            'title'=>'string',
            'content'=>'string',
            'image'=>'string',
            'category_id' => '',
            'tags' => ''
        ]);

        $tags = $data[ 'tags'];
        unset($data['tags']);

       $post->update($data);
//       $post->$post->fresh();
        $post->tags()->sync($tags);
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

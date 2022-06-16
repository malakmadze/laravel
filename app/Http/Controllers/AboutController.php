<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    #Read
    public function index()
    {
        $posts = Post::all();
        return view('about');
    }
}

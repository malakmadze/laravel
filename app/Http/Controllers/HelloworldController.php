<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloworldController extends Controller
{
    public function HelloWorld(Request $request){
        $today = date("d.M.Y");
        $message="Hello from controller" . $request->query("txt");

        return view ("helloworld", ["date"=>$today, "message"=>$message, "request"=>$request]);
        //return "Hello World!(From controller)";
    }

    public function GetWorld( int $id){
        return "You are accessing world $id";
    }
}

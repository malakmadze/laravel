<?php

use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    return view('welcome');
    return 'Hello';
});

//Create
Route::get('/posts/create', [PostController::class, 'create']);
//Read
Route::get('/posts', [PostController::class, 'index']);
//Update
Route::get('/posts/update', [PostController::class, 'update']);
//Delete
Route::get('/posts/delete', [PostController::class, 'delete']);

//FirstOrCreate
Route::get('/posts/first_or_create', [PostController::class, 'firstOrCreate']);
//UpdateOrCreate
Route::get('/posts/update_or_create', [PostController::class, 'updateOrCreate']);


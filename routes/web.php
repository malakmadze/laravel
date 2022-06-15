<?php

use App\Http\Controllers\MyPlaceController;
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

Route::get('/mypage', [MyPlaceController::class, 'index']);
//Route::get('/mypage', 'MyPlaceController@index');


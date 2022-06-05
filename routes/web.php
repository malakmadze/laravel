<?php

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
    return view('welcome');
});

Route::get('/hello/world',
    [\App\Http\Controllers\HelloworldController::class, 'HelloWorld']
) -> name ("hello");

Route::get('/hello/world/{world_id}',
    function ($world_id) {
        return " editing world $world_id";
    }
);

Route::get('/hell/o/world/{id}',
    [\App\Http\Controllers\HelloworldController::class, 'GetWorld']
)->where("id","[0-9]+"); // 404 error if id is not an integer

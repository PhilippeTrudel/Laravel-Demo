<?php

use Illuminate\Support\Facades\Route;
use App\Models\Monster;


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

Route::get('/monsters', function () {
    $monsters = Monster::all();
    return response($monsters, 200);
});


Route::get('/monsters/{id}', function ($id) {
    $monsters = Monster::find($id);
    return response($monsters, 200);
})->where('id', '[0-9]+');

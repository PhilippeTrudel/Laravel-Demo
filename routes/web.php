<?php

use Illuminate\Support\Facades\Route;
use App\Models\Monster;
use Illuminate\Http\Request;

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

//create
// POST
Route::post('/monsters', function(Request $request) {
    // instance the object
    $monster = new Monster();

    // set the request propreties to the monster instance
    $monster->name = $request->name;
    $monster->eyes = $request->eyes;
    $monster->ssn = $request->ssn;

    // save
    $monster->save();

    return $monster;
});

//update
// PUT
// Route::put();

// // Route::patch()


//delete
// DELETE
Route::delete('/monsters/{id}', function($id, ) {

    $monster = Monster::find($id);
    $monster->delete();
    return $monster;

})->where('id', '[0-9]+');
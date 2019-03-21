<?php

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

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/game/{product}', 'GameController@show')->name('game.show');
Route::get('/new/{new}', 'GameController@showNew')->name('game.showNew');
Route::get('/category/{id}', 'CategoryController@show')->name('category.show');
Route::post('/create', 'HomeController@create')->name('create');
Route::post('/createCat', 'HomeController@createCat')->name('createCat');
Route::post('/createNew', 'HomeController@createNew')->name('createNew');
Route::post('/search', 'GameController@search')->name('game.search');

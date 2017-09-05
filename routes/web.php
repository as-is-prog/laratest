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

Route::get('link/list', function(){
    $links = \App\Link::all();
    return view('link', ['links' => $links]);
});

Route::get('/project/create', function(){
    return view('createproject');
});

Route::post('/project/create', 'ProjectController@create');

Route::get('/product/register', function(){
    return view('registproduct');
});

Route::get('/project/search', function(){
    return view('searchproject');
});

Route::get('/project/{id}', 'ProjectController@show');

Route::get('/user/{id}','UserController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

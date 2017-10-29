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

if (env('APP_DEBUG', false) == false) {
    URL::forceScheme('https');
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('link/list', function(){
    $links = \App\Link::all();
    return view('link', ['links' => $links]);
});

Route::get('/project/create', function(){
    $tags = \App\Tag::all();
    return view('createproject',['tags' => $tags]);
})->middleware('auth');

Route::post('/project/create', 'ProjectController@create');

Route::post('/project/{id}/join', 'ProjectController@join');

Route::post('/project/{id}/terminate', 'ProjectController@terminate');

Route::get('/product/register', function(){
    return view('registproduct');
});

Route::get('/project/search', function(){
    $tags = \App\Tag::all();

    return view('searchproject',['tags' => $tags]);
});

Route::get('/project/{id}', 'ProjectController@show');

Route::get('/user/search', function(){
    $tags = \App\Tag::all();

    return view('searchuser',['tags' => $tags]);
});


Route::get('/user/{id}','UserController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

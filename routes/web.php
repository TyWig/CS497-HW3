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
    return redirect('login');
});

//Route::get('home', 'HomeController@index');

Route::group([
    'namespace' => 'Auth',
    ], function(){
    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout');
});

Route::group([
   'namespace' => 'Posts',
    ], function() {
   Route::get('posts/', 'PostsController@index');
   Route::get('posts/create', 'PostsController@create');
   Route::post('posts/create', 'PostsController@put');
   Route::delete('posts/{id}/delete', 'PostsController@delete');
   Route::get('posts/{id}/edit', 'PostsController@edit');
   Route::post('posts/{id}/edit', 'PostsController@update');
});

Auth::routes();

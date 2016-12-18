<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::any('/', ['as' => 'index', 'uses' => 'ProductsController@index']);

Route::any('/createProduct', ['as' => 'createProduct', 'uses' => 'ProductsController@createProduct']);


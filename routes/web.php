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
    return view('blog/index');
});

Route::get('register', 'App\Http\Controllers\RegisterController@register');
Route::post('register', 'App\Http\Controllers\RegisterController@create');
Route::get('login', 'App\Http\Controllers\LoginController@index');
Route::post('login', 'App\Http\Controllers\LoginController@login');
Route::get('logout', 'App\Http\Controllers\LogoutController@index');

//create category
Route::get('blog/category/', 'App\Http\Controllers\CategoryController@index');
Route::get('blog/category/create', 'App\Http\Controllers\CategoryController@create');
Route::post('blog/category/create', 'App\Http\Controllers\CategoryController@store');
Route::get('blog/category/detail/{id}', 'App\Http\Controllers\CategoryController@detail');
Route::get('blog/category/delete/{id}', 'App\Http\Controllers\CategoryController@delete');

// edit blog

Route::get('blog/category/edit/{id}', 'App\Http\Controllers\CategoryController@edit');
Route::post('blog/category/edit/{id}', 'App\Http\Controllers\CategoryController@update');




?>
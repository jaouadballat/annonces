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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/category/{id}', 'HomeController@category')->name('category');
Route::get('/city/{id}', 'HomeController@city')->name('city');
Route::get('/company/{id}', 'HomeController@company')->name('company');
Route::get('/search', 'HomeController@search')->name('search');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

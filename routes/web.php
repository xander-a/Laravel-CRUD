<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return 'Hello World';
});

Route::get('/news', array('as' => 'news.index', 'uses' => 'App\Http\Controllers\NewsController@index'));
Route::get('/news/add', array('as' => 'news.create', 'uses' => 'App\Http\Controllers\NewsController@create'));
Route::post('/news/store', array('as' => 'news.store', 'uses' => 'App\Http\Controllers\NewsController@store'));
Route::get('/news/edit/{id}', array('as' => 'news.edit', 'uses' => 'App\Http\Controllers\NewsController@edit'));
Route::patch('/news/update/{id}', array('as' => 'news.update', 'uses' => 'App\Http\Controllers\NewsController@update'));
Route::delete('/news/delete/{id}', array('as' => 'news.destroy', 'uses' => 'App\Http\Controllers\NewsController@destroy'));
Route::get('news/{slug}', array('as' => 'news.show', 'uses' => 'App\Http\Controllers\NewsController@show'));
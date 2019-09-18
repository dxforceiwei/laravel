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


use App\News;
Route::resource('login', 'login', ['only' => ['index', 'show', 'store']]);
Route::resource('logout', 'logout', ['only' => ['index']]);
Route::resource('defaults/export', 'defaults\export', ['only' => ['index']]);
Route::resource('defaults/news', 'defaults\news', ['only' => ['index']]);
Route::resource('defaults/news_add', 'defaults\news_add', ['only' => ['index','store']]);
Route::resource('defaults/query', 'defaults\query', ['only' => ['index','store']]);

//Route::group(['before'=>'auth_common_user'], function(){
	Route::resource('common_user/index', 'common_user\index');
	
//});

//Route::group(['before'=>'auth_superuser'], function(){
	Route::resource('superuser/news_add', 'superuser\news_add', ['only' => ['index','store']]);
	Route::resource('superuser/index', 'superuser\index', ['only' => ['index', 'store']]);
	Route::resource('superuser/fix_main', 'superuser\fix_main', ['only' => ['index', 'store']]);
	Route::resource('superuser/service_show', 'superuser\service_show', ['only' => ['index']]);
	
//});

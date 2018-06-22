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

Route::get('/', 'HomeController@index');
Route::namespace('StaticPage')->prefix('static')->group(function(){
    Route::get('/help', 'StaticPageController@help')->name('help');
    Route::get('/about', 'StaticPageController@about')->name('about');
});
Route::namespace('User')->group(function () {
    Route::get('reg','UserController@register')->name('reg');
    Route::resource('users', 'UserController');
    Route::get('login', 'SessionController@create')->name('login');
    Route::post('login', 'SessionController@store')->name('login');
    Route::delete('logout', 'SessionController@destroy')->name('logout');
    Route::get('signup/confirm/{token}','UserController@confirmEmail')->name('confirm_email');
});
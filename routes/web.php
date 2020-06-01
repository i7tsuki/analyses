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

Route::get('/', 'AnalysesController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    
    Route::group(['prefix' => 'analyses'], function () {
        Route::get('input', 'AnalysesController@input_show')->name('analyses.input_get');
        Route::post('input', 'AnalysesController@input_store')->name('analyses.input_post');
        
        Route::get('calculation', 'AnalysesController@calculation_show')->name('analyses.calculation');
        
        Route::get('about', 'AnalysesController@about_show')->name('analyses.about_get');
        Route::post('about', 'AnalysesController@about_store')->name('analyses.about_post');
    });
});
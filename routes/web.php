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
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@Update_avatar');

Route::get('/biodata', 'UserController@biodata');
Route::post('/biodata', 'UserController@Update_biodata');

Route::get('change-password', 'ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

Auth::routes(); 

Route::get('/home', 'HomeController@index')->name('home');



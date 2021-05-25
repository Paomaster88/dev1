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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);
Route::get('/', 'UserController@login');
Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@loginSubmit');
Route::get('/logout', 'UserController@logout')->name('logout');

Route::get('/register', 'UserController@register')->name('register');
Route::post('/register', 'UserController@registerSubmit')->name('registerSubmit');

Route::group(['prefix' => '/user',], function () {
    Route::get('/file-manager', function () {
        return view('layouts.file-manager');
    })->name('file-manager');
    Route::get('/home', 'UserController@index')->name('home');
    Route::post('/home/{id}', 'UserController@update')->name('update.userinfo');
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

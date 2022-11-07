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
    return redirect('login');
});

Route::get('login', 'LoginController@login_form');
Route::post('login', 'LoginController@do_login');
Route::get('register', 'LoginController@register_form');
Route::post('register', 'LoginController@do_register_form');
Route::get('logout', 'LoginController@logout');

Route::get('home', 'CollectionController@home');

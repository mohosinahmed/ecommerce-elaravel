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

// frontend.............
Route::get('/', 'HomeController@index');






// Backend.................
Route::get('logout', 'SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');

//category
Route::get('/all-category', 'CategoryController@index');
Route::get('/add-category', 'CategoryController@create');
Route::post('/save-category', 'CategoryController@store');
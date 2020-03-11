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
Route::get('/uncative_category/{category_id}', 'CategoryController@unactive_category');
Route::get('/active_category/{category_id}', 'CategoryController@active_category');
Route::get('/category/{id}/edit', 'CategoryController@edit_category');
Route::post('/category/{id}/edit', 'CategoryController@update_category');
Route::get('/category/{id}/delete', 'CategoryController@delete_category');


// manufactuer
Route::get('/all-manufacture', 'manufactureController@index');
Route::get('/add-manufacture', 'manufactureController@create');
Route::post('/save-manufacture', 'manufactureController@store');
Route::get('/uncative_manufacture/{manufacture_id}', 'manufactureController@unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}', 'manufactureController@active_manufacture');
Route::get('/manufacture/{id}/edit', 'manufactureController@edit_manufacture');
Route::post('/manufacture/{id}/edit', 'manufactureController@update_manufacture');
Route::get('/manufacture/{id}/delete', 'manufactureController@delete_manufacture');
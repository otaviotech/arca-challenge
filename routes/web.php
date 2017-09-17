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

Route::get('/', 'BusinessController@index');
Route::get('/business/{id}', 'BusinessController@show')->name('business.detail');

// Admin protected routes.
Route::group(['middleware'=>'auth'],function (){
  Route::get('/admin/busines/edit', 'BusinessController@edit')->name('business.edit');
  Route::get('/admin', 'BusinessController@list')->name('business.list');
  Route::post('/admin/business/store', 'BusinessController@store');
  Route::post('/admin/business/update/{id}', 'BusinessController@update');
  Route::delete('/admin/business/destroy/{id}', 'BusinessController@destroy');
  Route::get('/admin/business/create', 'BusinessController@create')->name('business.create');
  Route::get('/admin/business/edit/{id}', 'BusinessController@edit')->name('business.edit');
});


Auth::routes();

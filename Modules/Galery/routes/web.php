<?php

use Illuminate\Support\Facades\Route;
use Modules\Galery\App\Http\Controllers\GaleryController;

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

Route::group([], function () {
  Route::resource('galery', GaleryController::class)->names('galery');
});

Route::get('/galery', 'GaleryController@index')->name('galery.index');
Route::get('/galery/create', 'GaleryController@create')->name('galery.create');
Route::post('/galery', 'GaleryController@store')->name('galery.store');
Route::get('/galery/{id}/edit', 'GaleryController@edit')->name('galery.edit');
Route::post('/galery/{id}/update', 'GaleryController@update')->name('galery.update');
Route::delete('/galery/{id}', 'GaleryController@destroy')->name('galery.destroy');
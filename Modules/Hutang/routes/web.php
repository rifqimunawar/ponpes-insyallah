<?php

use Illuminate\Support\Facades\Route;
use Modules\Hutang\App\Http\Controllers\HutangController;

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

// Route::group([], function () {
//     Route::resource('hutang', HutangController::class)->names('hutang');
// });
Route::get('/hutang', 'HutangController@index')->name('hutang.index');
Route::get('/hutang/create', 'HutangController@create')->name('hutang.create');
Route::post('/hutang', 'HutangController@store')->name('hutang.store');
Route::get('/hutang/{id}/edit', 'HutangController@edit')->name('hutang.edit');
Route::post('/hutang/{id}/update', 'HutangController@update')->name('hutang.update');
Route::delete('/hutang/{id}', 'HutangController@destroy')->name('hutang.destroy');
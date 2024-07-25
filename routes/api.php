<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/total', 'StatistikController@total')->name('statistik.api.total');

Route::get('/rekening', 'RekeningController@index')->name('rekening.api.index');
Route::post('/rekening', 'RekeningController@store')->name('rekening.api.store');
Route::post('/rekening/{id}/update', 'RekeningController@update')->name('rekening.api.update');
Route::delete('/rekening/{id}', 'RekeningController@destroy')->name('rekening.api.destroy');

Route::get('/transaksi', 'TransaksiController@index')->name('transaksi.api.index');
Route::post('/transaksi', 'TransaksiController@store')->name('transaksi.api.store');
Route::post('/transaksi/{id}/update', 'TransaksiController@update')->name('transaksi.api.update');
Route::delete('/transaksi/{id}', 'TransaksiController@destroy')->name('transaksi.api.destroy');

Route::get('/kegiatan', 'KegiatanController@index')->name('kegiatan.api.index');
Route::post('/kegiatan', 'KegiatanController@store')->name('kegiatan.api.store');
Route::post('/kegiatan/{id}/update', 'KegiatanController@update')->name('kegiatan.api.update');
Route::delete('/kegiatan/{id}', 'KegiatanController@destroy')->name('kegiatan.api.destroy');

Route::get('/pengeluaran', 'PengeluaranController@index')->name('pengeluaran.api.index');
Route::post('/pengeluaran', 'PengeluaranController@store')->name('pengeluaran.api.store');
Route::post('/pengeluaran/{id}/update', 'PengeluaranController@update')->name('pengeluaran.api.update');
Route::delete('/pengeluaran/{id}', 'PengeluaranController@destroy')->name('pengeluaran.api.destroy');

Route::get('/kebutuhan', 'KebutuhanController@index')->name('kebutuhan.api.index');
Route::post('/kebutuhan', 'KebutuhanController@store')->name('kebutuhan.api.store');
Route::post('/kebutuhan/{id}/update', 'KebutuhanController@update')->name('kebutuhan.api.update');
Route::delete('/kebutuhan/{id}', 'KebutuhanController@destroy')->name('kebutuhan.api.destroy');

Route::get('/sumber_pemasukan', 'SumberPemasukanController@index')->name('sumber_pemasukan.api.index');
Route::post('/sumber_pemasukan', 'SumberPemasukanController@store')->name('sumber_pemasukan.api.store');
Route::post('/sumber_pemasukan/{id}/update', 'SumberPemasukanController@update')->name('sumber_pemasukan.api.update');
Route::delete('/sumber_pemasukan/{id}', 'SumberPemasukanController@destroy')->name('sumber_pemasukan.api.destroy');
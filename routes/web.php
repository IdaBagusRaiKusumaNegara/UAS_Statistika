<?php

use Illuminate\Routing\RouteGroup;
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

route::get('/beranda', 'BerandaController@index')->name('beranda');

route::get('/data', 'DataController@index')->name('data');
route::get('/dataexport', 'DataController@dataexport')->name('dataexport');
route::post('/dataimport', 'DataController@dataimportexcel')->name('dataimport');
route::get('/create-data', 'DataController@create')->name('create-data');
Route::post('/simpan-data', 'DataController@store')->name('simpan-data');
Route::get('/edit-data/{id}', 'DataController@edit')->name('edit-data');
Route::post('/update-data/{id}', 'DataController@update')->name('update-data');
Route::get('/delete-data/{id}', 'DataController@destroy')->name('delete-data');

route::get('/frekuensi', 'FrekuensiController@index')->name('frekuensi');

route::get('/data-berkelompok', 'DataBerkelompokController@index')->name('data-berkelompok');

route::get('/chikuadrat', 'ChikuadratController@index')->name('chikuadrat');

route::get('/lilliefors', 'LillieforsController@index')->name('lilliefors');

route::get('/produkmoment', 'ProdukMomentsControlloer@index')->name('produkmoment');
route::get('/create-produkmoment', 'ProdukMomentsControlloer@create')->name('create-produkmoment');
Route::post('/simpan-produkmoment', 'ProdukMomentsControlloer@store')->name('simpan-produkmoment');
Route::get('/edit-produkmoment/{id}', 'ProdukMomentsControlloer@edit')->name('edit-produkmoment');
Route::post('/update-produkmoment/{id}', 'ProdukMomentsControlloer@update')->name('update-produkmoment');
Route::get('/delete-produkmoment/{id}', 'ProdukMomentsControlloer@destroy')->name('delete-produkmoment');
route::get('/produkmomentexport', 'ProdukMomentsControlloer@dataexport')->name('produkmomentexport');
route::post('/produkmomentimport', 'ProdukMomentsControlloer@dataimportexcel')->name('produkmomentimport');

route::get('/uji-t', 'UjiTController@index')->name('uji-t');
route::get('/create-ujiT', 'UjiTController@create')->name('create-ujiT');
Route::post('/simpan-ujiT', 'UjiTController@store')->name('simpan-ujiT');
Route::get('/edit-ujiT/{id}', 'UjiTController@edit')->name('edit-ujiT');
Route::post('/update-ujiT/{id}', 'UjiTController@update')->name('update-ujiT');
Route::get('/delete-ujiT/{id}', 'UjiTController@destroy')->name('delete-ujiT');
route::get('/dataexport', 'UjiTController@dataexport')->name('dataexport');
route::post('/dataimport', 'UjiTController@dataimportexcel')->name('dataimport');

route::get('/uji-anava', 'UjiAnavaController@index')->name('uji-anava');
route::get('/create-anava', 'UjiAnavaController@create')->name('create-anava');
Route::post('/simpan-anava', 'UjiAnavaController@store')->name('simpan-anava');
Route::get('/edit-anava/{id}', 'UjiAnavaController@edit')->name('edit-anava');
Route::post('/update-anava/{id}', 'UjiAnavaController@update')->name('update-anava');
Route::get('/delete-anava/{id}', 'UjiAnavaController@destroy')->name('delete-anava');
route::get('/dataexport', 'UjiAnavaController@dataexport')->name('dataexport');
route::post('/dataimport', 'UjiAnavaController@dataimportexcel')->name('dataimport');
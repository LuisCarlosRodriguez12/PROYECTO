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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource("retos","RetoController");

Route::resource('aliados_estrategicos','Aliados_estrategicosController')
    ->names('aliados_estrategicos')
    ->parameters(['aliados_estrategicos' => 'lis_aliados']); 
Route::resource('buscar','BuscarController')
    ->names('buscar')
    ->parameters(['buscar' => 'lis']);




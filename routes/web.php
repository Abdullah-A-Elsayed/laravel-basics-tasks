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

Route::resource('contenent','ContenentController');
Route::resource('country','CountryController');
/* --------------------------------------------------
   get: 
        /contenent              @index()
        /contenent/create       @create()
        /contenent/{id}/edit    @edit()
        /contenent/{id}         @show()
   post:
        /contenent              @store()
   delete:
        /contenent/{id}/        @destroy()
   put/patch:
        /contenent/{id}/        @update
----------------------------------------------------*/


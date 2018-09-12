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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('programme_finder');
});

//Route::resource('programmes', 'ProgrammeController');

// Add CSRF protection later. https://laravelcollective.com/docs/5.0/html#csrf-protection
Route::get('programmes/show', 'ProgrammeController@show')->name('show');
Route::get('programmes/query/{search}', 'ProgrammeController@query')->name('query');

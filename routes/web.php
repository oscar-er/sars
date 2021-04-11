<?php

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

Route::get('/', 'CountryController@viewCountries')->name('countries.home');


Route::get('/create', function(){
    return view('countries.create');
})->name('countries.create');


Route::post('/create/new', 'CountryController@saveCountry')->name('countries.create.new');

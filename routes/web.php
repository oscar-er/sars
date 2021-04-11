<?php

use Illuminate\Support\Facades\Route;


/*
 * @return view => retorna la vista index a través del método viewCountry del controlador CountryController
 */
Route::get(
    '/',
    'CountryController@viewCountries'
)->name('countries.home');

/*
 * @return view => retorna la vista del formulario create mediante la ruta /craete
 */
Route::get(
    '/create',
    function(){
        return view('countries.create');
    }
)->name('countries.create');

/*
 * @POST $data => permite enviar el form al método saveCountry del controlador CountryController
 */
Route::post(
    '/create/new',
    'CountryController@saveCountry'
)->name('countries.create.new');

/*
 * @DELETE $id => permite eliminar el registro enviado al método deleteCountry del controlador CountryController
 */
Route::delete(
    '/delete/{id}',
    'CountryController@deleteCountry'
)->name('countries.delete');

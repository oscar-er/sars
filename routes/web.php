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
 * @DELETE $id => elimina el registro enviado al método deleteCountry del controlador CountryController
 * @param id => id del registro
 */
Route::delete(
    '/delete/{id}',
    'CountryController@deleteCountry'
)->name('countries.delete');


/*
 * @return view => retorna la vista del form para editar con relación al método viewEditForm de CountryController
 * @param id => id del registro
 */
Route::get(
    '/countries/edit/{id}',
    'CountryController@editCountry'
)->name('countries.edit');

/*
 * @PUT $id => actualiza el registro enviado a updateCountry del controlador CoutnryController
 * @param id => id del registro
 */
Route::put(
    '/contries/edit/data/{id}',
    'CountryController@updateCountry'
)->name('countries.update');

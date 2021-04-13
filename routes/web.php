<?php

use Illuminate\Support\Facades\Route;





/*
 * Ruta que solicita una peticion GET al servidor para invocar una funcion del controlador y mostrar la vista
 *
 * ejemplo: 127.0.0.1:8000/
 *
 *
 * Controller => CountryController
 * Function => countryView()
 * route('countries.home')
 */
Route::get(
    '/',
    'CountryController@countryView'
)->name('countries.home');





/*
 * Ruta que solicita una peticion GET al servidor para retornar la vista create
 *
 * ejemplo: 127.0.0.1:8000/create
 *
 * route('countries.create')
 *
 * @return /view
 */
Route::get(
    '/create',
    'CountryController@countryCreate'
)->name('countries.create');





/*
 * Ruta que solicita una peticion POST al servidor para invocar la funcion countrySave() y almacenar los registros
 *
 * Controller => CountryController
 * Function => countrySave()
 * route('countries.create.new')
 */
Route::post(
    '/create/new',
    'CountryController@countrySave'
)->name('countries.create.new');





/*
 * Ruta que solicita una peticion DELETE al servidor para invocar la funcion countryDelete($id) para eliminar un registro
 *
 * ejemplo: 127.0.0.1:8000/delete/4
 *
 * Controller => CoountryController
 * Function => countryDelete($id) -> solicita un parametro id para buscar el registro a eliminar
 * route('countries.delete')
 *
 *@param $id  -> id del registro
 */
Route::delete(
    '/delete/{id}',
    'CountryController@countryDelete'
)->name('countries.delete');





/*
 * Ruta que solicita una peticion GET al servidor para invocar la funcion countryEdit($id) para mostrar el form a editar
 *
 * ejemplo: 127.0.0.1:8000/countries/edit/4
 *
 * Controller => CountryController
 * Function => countryEdit($id)  ->  solicita un parametro id para buscar el registro a editar
 * route('countries.edit');
 *
 * @param $id  -> id del registro
 */
Route::get(
    '/countries/edit/{id}',
    'CountryController@countryEdit'
)->name('countries.edit');





/*
 * Ruta que solicita una peticion PUT al servidor para invocar una funcion countryUpdate($id) para actualizar un registro
 *
 * ejemplo: 127.0.0.1:8000/countries/edit/data/4
 *
 * Controller => CountryController
 * Function => countryUpdate($id)  ->  solicita un parametro id para buscar el registro a actualizar
 * route('countries.update')
 *
 * @param $id -> id del registro
 */
Route::put(
    '/contries/edit/data/{id}',
    'CountryController@countryUpdate'
)->name('countries.update');




/*
 * Ruta que solicita una peticion GET al servidor para invocar la funcion countryDetail($id, $slug) que permite mostrar
 * los datos del registro como detalles
 *
 * ejemplo:  127.0.0.1:8000/countries/detail/4/mexico
 *
 *
 * Controller => CountryController
 * Function => countryDetail($id, $slug)  ->  solicita el parametro id para buscar el registro
 *              y el parametro slug para iniciar una busqueda al API
 * route('countries.detail')
 *
 */
Route::get(
    '/countries/detail/{id}/{slug}',
    'CountryController@countryDetail'
)->name('countries.detail');



<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;



class CountryController extends Controller
{



    /*
     * Funcion que valida los datos que el usuario ingresa en los input[type='text']
     *
     * @param $request
     */
    public function validateFields(Request $request)
    {
        // se valida la solicitud para los campos  country | slug | iso2  |  disponibles en los form de create & update
        $request->validate([
            'country' => 'required|max:75',
            'slug' => 'required|max:75',
            'iso2' => 'required|max:2'
        ]);
    }



    /*
     * Funcion que devuelve la fecha para hacer la busqueda de casos SARS CoV 2 al corte generado a traves de la API.
     * Esta API solicita un rango de fecha inicial y fecha final para generar el corte y retornar el total de casos.
     * Para esto, la funcion permite retornar un array asociativo con el rango de fecha inicial y final.
     *
     *
     * @return array
     */
    public function setDate()
    {
        // se declara la zona horaria para America/Mexico
        date_default_timezone_set('America/Mexico_City');
        // rango de fecha inicial
        $day = date('d') - 1;
        $initialDate = date('Y-m-'.$day).'T00:00:00Z';
        // rango de fecha final
        $finalDate = date('Y-m-d').'T00:00:00Z';
        return [
            'initialDate' => $initialDate,
            'finalDate' => $finalDate
        ];
    }



    /*
     * Funcion para mostrar la vista index y transportar los registros actuales de la Base de Datos
     *
     * @return /view('countries.index')
    */
    public function countryView()
    {
        $dataCountries = Country::all();
        return view(
            'countries.index',
            compact('dataCountries')
        );
    }



    /*
     * Funcion que guarda los datos recibidos a través de la petición POST al servidor
     *
     * @param $request
     * @return route('countries.home')
     */
    public function countrySave(Request $request)
    {
        $dataCountry = request()->except('_token');
        // ejecuta la validación de los campos
        $this->validateFields($request);
        Country::insert($dataCountry);
        // guarda el mensaje saveAlert
        Session::flash(
            'saveAlert',
            'El país ' . $dataCountry['country'] . ' se almacenó correctamente'
        );
        return redirect()->route('countries.home');
    }


    /*
     * Funcion para eliminar los datos del registro encontrado enviado a traves de la peticion DELETE al servidor
     * solicita como parametro el $id del registro a eliminar
     *
     * @param $id
     * @return route('countries.home')
     */
    public function countryDelete($idCountry)
    {
        try
        {

            Country::destroy($idCountry);
            // guarda el mensaje deleteCountry
            Session::flash(
                'deleteCountry',
                'El registro ha sido eliminado correctamente'
            );
            return redirect()->route('countries.home');

        } catch (\Exception $error) {

            return $error->getMessage();

        }
    }


    /*
     * Funcion para mostrar la vista edit y transportar los datos del registro almacenados en la DB
     * solicita como parametro el id del registro que busca para mostrar sus datos
     *
     * @param $id
     * @return view('countries.edit')
     */
    public function countryEdit($id)
    {
        try
        {

            $dataCountry = Country::findOrFail($id);
            return view('countries.edit', compact('dataCountry'));

        } catch (\Exception $exception) {

            return back();

        }
    }


    /*
     * Funcion para actualizar los datos del registro en la DB
     * solicita como parametro el id del registro para buscar y ejecutar la actualizacion
     *
     * @param $request
     * @param $id
     * @return route('countries.edit')
     */
    public function countryUpdate(Request $request, $id)
    {
        try
        {

            $dataCountryUpdate = request()->except('_token', '_method');
            // ejecuta la validadcion de los campos
            $this->validateFields($request);
            Country::where('id', '=', $id)->update($dataCountryUpdate);
            // guarda el mensaje 'updateCountry'
            Session::flash(
                'updateCountry',
                'El registro se actualizó correctamente'
            );
            return redirect()->route('countries.edit', $id);

        } catch (\Exception $exception)
        {

            return back();

        }
    }



    /*
     * Funcion que consulta la API covid19api y permite obtener los casos registrados de SARS-CoV-2 con base al slug
     * registrado en la base de datos.
     *
     * Se solicita la peticion a la API indicando el rango de fechas para iniciar la busqueda a traves de
     * https://api.covid19api.com/country/{$slug}/status/confirmed?from={fechaInicial}&to={fechaFinal}
     *
     * Al obterner los datos se muestra la vista detail y transporta los datos del registro consultado
     *
     * @return /view('countries.detail')
     * @param $id
     * @param $slug
     */
    public function countryDetail($id, $slug)
    {
        try
        {
            $cases = 0;
            // rangos de fechas
            $initialDate = $this->setDate()['initialDate'];
            $finalDate = $this->setDate()['finalDate'];
            // solicitud a la API
            $requestAPI = Http::get('https://api.covid19api.com/country/' . $slug . '/status/confirmed?from=' .
                $initialDate . '&to=' . $finalDate);
            $response = $requestAPI->json();
            // validacion de la respuesta obtenida, si no hay coincidencias de busqueda retorna un mensaje de error
            if(empty($response['message']))
            {
                // busqueda del pais en la base de datos local
                $responseDB = Country::findOrFail($id);
                foreach($response as $item)
                {
                    if($item['Date'] == $initialDate)
                    {
                        $cases += $item['Cases'];
                    }
                }
                return view('countries.detail', compact('responseDB', 'cases'));
            } else
            {
                Session::flash(
                    'notMatches',
                    'Ha ocurrido un error. No se encontrarón coincidencias en la busqueda.'
                );
                return redirect()->route('countries.home');
            }
        }catch (\Exception $exception)
        {
            Session::flash(
                'error',
                'Se detecto un error en la petición y la solicitud fue rechazada. Intenta nuevamente.'
            );
            return redirect()->route('countries.home');
        }
    }

}

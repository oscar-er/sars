<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CountryController extends Controller
{
    /*
     * @param request => validacion de la solicitud sobre los textFields
     */
    public function validateFields(Request $request){
        // se valida la solicitud para los campos  country | slug | iso2  |  disponibles en los form de create & update
        $request->validate([
            'country' => 'required|max:75',
            'slug' => 'required|max:75',
            'iso2' => 'required|max:2'
        ]);
    }

    /*
     *@return view => retorna la vista index transportando los registros
    */
    public function viewCountries()
    {
        $dataCountries = Country::all();
        return view(
            'countries.index',
            compact('dataCountries')
        );
    }

    /*
     * @return view => retorna una redireccion a la ruta 'countries.home'
     */
    public function saveCountry(Request $request)
    {
        $dataCountry = request()->except('_token');
        // realiza la validación invocando al método validateFields
        $this->validateFields($request);
        Country::insert($dataCountry);
        // guarda el mensaje saveAlert
        Session::flash(
            'saveAlert',
            'El país ' . $dataCountry['country'] . ' se almaceno correctamente'
        );
        return redirect()->route('countries.home');
    }


    /*
     * @return view => retorna la vista index despues de ejecutar un delete
     */
    public function deleteCountry($idCountry)
    {
        Country::destroy($idCountry);
        // guarda el mensaje deleteCountry
        Session::flash(
            'deleteCountry',
            'El registro ha sido eliminado correctamente'
        );
        return redirect()->route('countries.home');
    }

    /*
     * @return view => retorna la vista edit
     * @param id => regristro recibido mediante el route('countries.edit')
     */
    public function editCountry($id)
    {
        $dataCountry = Country::findOrFail($id);
        return view('countries.edit', compact('dataCountry'));
    }

    public function updateCountry(Request $request, $id)
    {
        $dataCountryUpdate = request()->except('_token', '_method');
        $this->validateFields($request);
        Country::where('id', '=', $id)->update($dataCountryUpdate);
        Session::flash(
            'updateCountry',
            'El registro se actualizó correctamente'
        );
        return redirect()->route('countries.edit', $id);
    }



}

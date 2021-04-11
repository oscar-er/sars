<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CountryController extends Controller
{
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
        // realiza validaciones a los campos del form create  | country | slug | iso2
        $validator = $this->validate($request, [
            'country' => 'required|max:75',
            'slug' => 'required|max:75',
            'iso2' => 'required|max:2'
        ]);

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
    public function deleteCountry($idCountry){

        Country::destroy($idCountry);
        // guarda el mensaje deleteCountry
        Session::flash(
            'deleteCounty',
            'El registro del país ' . $idCountry . ' ha sido eliminado correctamente'
        );
        return redirect()->route('countries.home');
    }

}

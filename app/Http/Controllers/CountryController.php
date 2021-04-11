<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CountryController extends Controller
{
    /*
     *@return view
    */
    public function viewCountries(){
        $dataCountries = Country::all();
        return view('countries.index', compact('dataCountries'));
    }

    public function saveCountry(Request $request){
        $dataCountry = request()->except('_token');
        $validator = $this->validate($request, [
            'country' => 'required|max:75',
            'slug' => 'required|max:75',
            'iso2' => 'required|max:2'
        ]);
        Country::insert($dataCountry);
        Session::flash('saveAlert', 'El país ' . $dataCountry['country'] . ' se almaceno correctamente');
        //return $this->viewCountries();
        return redirect()->route('countries.home');
    }

}

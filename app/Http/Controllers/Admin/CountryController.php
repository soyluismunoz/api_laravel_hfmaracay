<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
  public function __construct()
  {
    $this->middleware('api');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $countries = Country::all();

    return response()->json($countries, 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      'iso2' => 'required|string|max:2',
      'iso3' => 'required|string|max:3',
      'prefix' => 'required|number',
      'name' => 'required|string',
      'continent' => 'required|string|in:Asia,Europa,Antártida,África,Oceanía,América',
      'subcontinent' => '',
      'iso_currency' => '',
      'name_currency' => '',
      'flag' => ''
    ], [
      'iso2.required' => 'ISO2 es requerido',
      'iso2.string' => 'ISO2 debe ser una cadena de caracteres',
      'iso2.max' => 'ISO2 debe tener máximo 2 caracteres',
      'iso3.required' => 'ISO3 es requerido',
      'iso3.string' => 'ISO3 debe ser una cadena de caracteres',
      'iso3.max' => 'ISO3 debe tener máximo 3 caracteres',
      'continent.required' => 'Continent es requerido',
      'continent.string' => 'Continent debe ser una cadena de caracteres',
      'continent.in' => 'Continent inválido'
    ]);

    $country = Country::create([
      'iso2' => $data['iso2'],
      'iso3' => $data['iso3'],
      'prefix' => $data['prefix'],
      'name' => $data['name'],
      'continent' => $data['continent'],
      'subcontinent' => $data['subcontinent'],
      'iso_currency' => $data['iso_currency'],
      'name_currency' => $data['name_currency'],
      'flag' => $data['flag']
    ]);

    return response()->json($country, 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Country  $country
   * @return \Illuminate\Http\Response
   */
  public function show(Country $country)
  {
    return response()->json($country, 200);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Country  $country
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Country $country)
  {
    $data = $request->validate([
      'iso2' => 'required|string|max:2',
      'iso3' => 'required|string|max:3',
      'prefix' => 'required|number',
      'name' => 'required|string',
      'continent' => 'required|string|in:Asia,Europa,Antártida,África,Oceanía,América',
      'subcontinent' => '',
      'iso_currency' => '',
      'name_currency' => '',
      'flag' => ''
    ], [
      'iso2.required' => 'ISO2 es requerido',
      'iso2.string' => 'ISO2 debe ser una cadena de caracteres',
      'iso2.max' => 'ISO2 debe tener máximo 2 caracteres',
      'iso3.required' => 'ISO3 es requerido',
      'iso3.string' => 'ISO3 debe ser una cadena de caracteres',
      'iso3.max' => 'ISO3 debe tener máximo 3 caracteres',
      'continent.required' => 'Continent es requerido',
      'continent.string' => 'Continent debe ser una cadena de caracteres',
      'continent.in' => 'Continent inválido'
    ]);

    $country->fill([
      'iso2' => $data['iso2'],
      'iso3' => $data['iso3'],
      'prefix' => $data['prefix'],
      'name' => $data['name'],
      'continent' => $data['continent'],
      'subcontinent' => $data['subcontinent'],
      'iso_currency' => $data['iso_currency'],
      'name_currency' => $data['name_currency'],
      'flag' => $data['flag']
    ]);
    
    $country->save();

    return response()->json($country, 200);
  }

  /**
   * Delete the specified resource.
   *
   * @param  \App\Country  $country
   * @return \Illuminate\Http\Response
   */
  public function delete(Country $country)
  {
    $country->delete();

    return response()->json([
      'message' => 'Country eliminado'
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id)
  {
    $country = Country::onlyTrashed()->where('id', $id)->first();

    $country->forceDelete();

    return response()->json([
      'message' => 'Country destruido'
    ]);
  }
}

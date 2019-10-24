<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller
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
    $areas = Area::all();

    return response()->json($areas, 200);
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
      'name' => 'required|string|max:190'
    ], [
      'name.required' => 'El Nombre es requerido',
      'name.string' => 'El Nombre debe ser una cadena de caracteres',
      'name.max' => 'El Nombre debe tener máximo 190 caracteres',
    ]);

    $area = Area::create([
      'name' => $data['name']
    ]);

    return response()->json($area, 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Area  $area
   * @return \Illuminate\Http\Response
   */
  public function show(Area $area)
  {
    return response()->json($area, 200);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Area  $area
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Area $area)
  {
    $data = $request->validate([
      'name' => 'required|string|max:190'
    ], [
      'name.required' => 'El Nombre es requerido',
      'name.string' => 'El Nombre debe ser una cadena de caracteres',
      'name.max' => 'El Nombre debe tener máximo 190 caracteres',
    ]);

    $area->fill([
      'name' => $data['name'],
    ]);
    
    $area->save();

    return response()->json($area, 200);
  }

  /**
   * Delete the specified resource.
   *
   * @param  \App\Area  $area
   * @return \Illuminate\Http\Response
   */
  public function delete(Area $area)
  {
    $area->delete();

    return response()->json([
      'message' => 'Area eliminada'
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
    $area = Area::onlyTrashed()->where('id', $id)->first();

    $area->forceDelete();

    return response()->json([
      'message' => 'Area destruida'
    ]);
  }
}

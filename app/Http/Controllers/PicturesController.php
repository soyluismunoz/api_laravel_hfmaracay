<?php

namespace App\Http\Controllers;

use App\Pictures;
use Illuminate\Http\Request;

class PicturesController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }

    public function get()
    {
        //TODO: implementar
    }

    public function add(Request $request)
    {
        //TODO: implementar
    }

    public function show($id)
    {
        //TODO: implementar
    }

    public function delete($id)
    {
        //TODO: implementar
    }
}

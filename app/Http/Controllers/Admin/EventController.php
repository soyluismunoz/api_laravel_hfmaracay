<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
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

    public function patch($id, Request $request)
    {
        //TODO: implementar
    }

    public function delete($id)
    {
        //TODO: implementar
    }
}

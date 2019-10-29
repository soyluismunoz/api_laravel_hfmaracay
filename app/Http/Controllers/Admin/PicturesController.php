<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Queries\PictureFilter;
use Illuminate\Http\Request;
use App\Pictures;

class PicturesController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }

    public function get(Request $request, PictureFilter $filters)
    {
    $pictures = Picture::query()
                    ->filterBy($filters, $request->only(['search', 'from', 'to']))
                    ->orderBy('id', 'DESC')
                    ->paginate();
    $pictures->appends($filters->valid());

    return response()->json($pictures, 200);
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

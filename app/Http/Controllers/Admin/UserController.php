<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Queries\UserFilter;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }

    /**
     * Display a listing of the resource.
     * @param  Illuminate\Http\Request App\Queries\UserFilter
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, UserFilter $filters)
    {
        $users = User::query()
            ->filterBy($filters, $request->only(['search', 'from', 'to']))
            ->orderBy('id', 'DESC')
            ->paginate();

        $users->appends($filters->valid());

        return response()->json($users, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */

    public function show(User $user)
    {
        return response()->json($user, 200);
    }

    /**
     * Delete the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'Usuario eliminado con éxito'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->first();

        $user->forceDelete();

        return response()->json([
            'message' => 'Usuario eliminado con éxito'
        ]);
    }
}

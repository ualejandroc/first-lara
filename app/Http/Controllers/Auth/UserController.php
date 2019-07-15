<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * Mostrar información de un usuario.
     * @param  int  $id
     * @return Response
     */
    public function showProfile($id)
    {
        // $user = User::findOrFail($id);
        $user ='usuario';
        return view('user.profile', array('user' => $user));
    }

    public function store(Request $request)
    {
        $name = $request->input('nombre');

        //...
    }
}

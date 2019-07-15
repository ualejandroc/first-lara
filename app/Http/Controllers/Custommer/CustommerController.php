<?php

namespace App\Http\Controllers\Custommer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Custommer;

class CustommerController extends Controller
{
   
    function insertUserData(){
        $user = new User;
        $user->name = 'Juan';
        $user->save();
        $insertedId = $user->id;
        return $insertedId ;
    }

    function insertCustommerData(){
        $user = new Custommer;
        $user->code = '245';
        $user->save();
        $insertedId = $user->id;
        return $insertedId ;
    }


    function createNew(){
        $insertedId= $this->insertCustommerData(); 

        return view('custommers.profile', array(
            'titulo' => 'Se creo el custommer :',
            'user'=>$insertedId)
        );  //array('id'=>$id)
    }



}

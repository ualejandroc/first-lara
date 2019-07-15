<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MoviesController extends Controller
{
    public $arrayPeliculas=array();

    public function  getIndex(){

        return view('catalog.index', array(
            'titulo' => 'Listado películas',
            'arrayPeliculas'=>$this->arrayPeliculas)
        );  //array('id'=>$id)
    }

    public function  getShow($id){
        return view('catalog.show', array('id'=>$id));
    }

    public function  getCreate(){

    }

    public function  getEdit($id){

    }
    

}

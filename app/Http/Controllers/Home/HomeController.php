<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getHome(){
        // return view('home');  //array('id'=>$id)
        return redirect()->action('Catalog\MoviesController@getIndex');
    } 
}

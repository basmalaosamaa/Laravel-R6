<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    function contact (){
        return view('Contact');
    }
    function recieve (Request $request){
        return $request['name'] . '<br>' . $request['email'] . '<br>' . $request['subj'] .'<br>'. $request['msg'];
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    // function login (){
    //     return view('login');
    // }

    function Contact () {
        return view('Contact');
    }
    function data () {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subj = $_POST['subj'];
        $msg = $_POST['msg'];
      
        return view('contactData', compact('name', 'email', 'subj', 'msg'));
      }
}

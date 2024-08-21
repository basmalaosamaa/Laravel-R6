<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show(){
        return view('Contact');
    }

    public function store(Request $request){
        $data = $request->except('_token');

        Mail::to('test@example.com')->send(new ContactUs ($data));

        return "Message sent successfuly";
    }
}

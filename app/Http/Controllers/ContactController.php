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
        $data = $request->validate([
            'name' => 'required|min:3' ,
            'email' => 'required|email' ,
            'subj' => 'required|' ,
            'msg' => 'required|min:5' ,
        ]);

        Mail::to('receipentemail@gmail.com')->send(new ContactUs($data));
        dd('send');
        return redirect()->back()->with('success' , 'message send successfully');
    }
}

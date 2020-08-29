<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        $data=\request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'massage'=>'required'
        ]);

        //Send email
        Mail::to('test@test.com')->send(new ContactFormMail($data));
        /*
         * We can use this one or the other we use it now
        session()->flash('massage','Thanks for your massages. we\'ll be in touch.');
        return redirect('contact');
        */
        return redirect('contact')->with('massage','Thanks for your massages. we\'ll be in touch.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Input;


class MailController extends Controller
{
    public function index(Request $request)
    {
        return view('superuser/pages/frontmail');
    }
    
    public function sends(Request $request)
    {
        // validation email
        $this->validate($request, [
            'email' => 'required'
        ]);

        Mail::to($request->input('email'))->send(new SendMail());//send email with instance of  mailable class
        return redirect()->back()->with('success', 'Email sent successfully!'); //come back to this page 

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Input;
use DB;


class MailController extends Controller
{
    public function index()
    {
        $data =DB::table('users')->select('email as email')->get();
        return view('superuser/pages/frontmail')-> with('mail', $data);
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

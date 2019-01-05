<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Input;


class MailController extends Controller
{
    public function send(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);
     Mail::to($request->input('email'))->send(new SendMail());
     return redirect()->back()->with('success', 'Email sent successfully. Check your email.');
    }
}

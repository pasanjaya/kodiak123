<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/dashboard.pages.messages');
    }

    /**
     * Store a message in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'email' => 'required|email',
            'subject' => 'required|max:150',
            'message' => 'required|string|max:255'
        ]);
        // get message model and store message data in the database
        $msg = new Message;
        $msg->user_id = auth()->user()->id;
        $msg->subject = $request->input('subject');
        $msg->message = $request->input('message');
        $msg->save();

        return redirect('/dashboard')->with('success', 'Send message successfuly!');

    }
    
}

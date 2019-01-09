<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

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

    public function send()
    {
        Mail::send(['text'=>'mail'], ['name','pasan'], function($message){
            $message->to('kodiakmailservice@gmail.com','To KodiakTeam')->subject('Test Email');
            $message->from('pasan94edu@gmail.com','CristalC');
        });
    }
    
}

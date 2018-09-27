<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
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


    // public function index(){
    //     return view('pages.index');
    // }

    public function index(){
        return view('dashboard.pages.index');
    }

    public function offers(){
        return view('dashboard.pages.offers');
    }
}

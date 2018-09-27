<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        return view('frontpages.index');
    }

    public function deals(){
        return view('frontpages.deals');
    }

    public function about(){
        return view('frontpages.about');
    }

    public function contact(){
        return view('frontpages.contact');
    }
}

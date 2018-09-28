<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;

class LandingPageController extends Controller
{
    public function index(){
        $deals = Advertisement::orderBy('updated_at', 'desc')->take(12)->get();
        return view('frontpages.index')->with('deals', $deals);
    }

    public function deals(){
        return view('frontpages.deals');
    }

    public function details(){
        return view('frontpages.details');
    }
    

    public function about(){
        return view('frontpages.about');
    }

    public function contact(){
        return view('frontpages.contact');
    }
}

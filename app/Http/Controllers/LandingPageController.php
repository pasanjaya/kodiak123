<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use Carbon\Carbon;

class LandingPageController extends Controller
{
    public function index(){
        //get data for advertiment from db and pass them to blade
        $deals = Advertisement::where('reject_flag', '=', 0)->orderBy('updated_at', 'desc')->take(12)->get();
        $today = Carbon::now()->toDateString();
        return view('frontpages.index')->with('deals', $deals)->with('today', $today);
    }

    public function deals(){
        return view('frontpages.deals');
    }

    public function details(){
        //show a details about a advertisment
        return view('frontpages.details');
    }
    

    public function about(){
        return view('frontpages.about');
    }

    public function contact(){
        return view('frontpages.contact');
    }
}

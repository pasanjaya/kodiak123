<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use Carbon\Carbon;

class LandingPageController extends Controller
{
    public function index(){
        $deals = Advertisement::where('reject_flag', '=', 0)
                                ->where('verified_adv', '=', 1)
                                ->orderBy('updated_at', 'desc')->take(12)->get();
        $today = Carbon::now()->toDateString();
        return view('frontpages.index')->with('deals', $deals)->with('today', $today);
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

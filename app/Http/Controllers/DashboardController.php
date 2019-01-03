<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        // return($user->profile);
        return view('dashboard.pages.index')->with('profile', $user->profile);
    }

    public function offers(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id); 
        return view('dashboard.pages.offers')->with('profile', $user->profile);
    }

    public function profile(){

        $user_id = auth()->user()->id;
        $user = User::find($user_id); 
        return view('dashboard.pages.profile')->with('profile', $user->profile);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Advertisement;
use App\BusinessProfile;

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

        $profile = BusinessProfile::where('user_id', '=', $user_id)->take(1)->get(); //get brand view count from db
        $advs = Advertisement::where('user_id', '=', $user_id); //get advertisments from db
        $viewCount = Advertisement::where('user_id', '=', $user_id)->sum('view_count'); //get view count from db

        if(is_null($user->profile)) {
            return redirect()->action('BusinessProfileController@create');
        }

        // redirect if profile not created
        // $count = $profile->count();
        // if($count === 0){
        //     return redirect()->action('BusinessProfileController@create');
        // }
        
        return view('dashboard.pages.index')->with('profile', $user->profile)
        ->with('brandHits', $user->profile->brand_hits)
        ->with('viewCount', $advs->sum('view_count'))
        ->with('adCount', $advs->count());
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

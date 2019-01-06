<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Advertisement;
use App\BusinessProfile;
use App\Charts\DashboardAdvChart;

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


    public function index(){

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $profile = BusinessProfile::where('user_id', '=', $user_id)->take(1)->get(); //get brand view count from db
        $advs = Advertisement::where('user_id', '=', $user_id); //get advertisments from db

        $chart = new DashboardAdvChart;
        
        $data = $advs->get(['id', 'view_count']);

        $labels = array();
        $dataset = array();

        foreach($data as $item){
            $labels[] = $item->id;
            $dataset[] = $item->view_count;
        }
        
        $chart->labels($labels);
        $chart->dataset('View Count', 'horizontalBar', $dataset);
        $chart->minimalist(false);


        if(is_null($user->profile)) {
            return redirect()->action('BusinessProfileController@create');
        }

        return view('dashboard.pages.index')->with('profile', $user->profile)
        ->with('subscribers', $user->profile->subscribe_count)
        ->with('brandHits', $user->profile->brand_hits)
        ->with('viewCount', $advs->sum('view_count'))
        ->with('adCount', $advs->count())
        ->with('chart', $chart);
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

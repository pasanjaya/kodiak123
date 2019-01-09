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

        //get advertisments from db which are belongs to current user
        $advs = Advertisement::where('user_id', '=', $user_id); 

        // create an object of char
        $chart = new DashboardAdvChart;
        
        // get view count data to include into the chart
        $data = $advs->get(['id', 'view_count']);

        $labels = array(); // advertisement id array
        $dataset = array(); // advertisement view count array

        // fill two arrys
        foreach($data as $item){
            $labels[] = $item->id;
            $dataset[] = $item->view_count;
        }
        
        // add chart properties
        $chart->labels($labels);
        $chart->dataset('View Count', 'horizontalBar', $dataset);
        $chart->minimalist(false);

        // profile validation check
        // if profile is not filled then redirect to form filling page

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

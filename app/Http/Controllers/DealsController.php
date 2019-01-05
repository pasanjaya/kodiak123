<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\AdvertisementView;
use App\BusinessProfile;
use Carbon\Carbon;

class DealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals = Advertisement::where('reject_flag', '=', 0)->inRandomOrder()->take(16)->get();

        $today = Carbon::now()->toDateString();
        
        return view('frontpages.deals')->with('deals', $deals)->with('today', $today);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deal = Advertisement::find($id);
        
        // incriment view by one and save back to relation
        $count = AdvertisementView::incrementViewCount($deal);
        $deal -> view_count = $count;
        $deal->save();

        $profile = BusinessProfile::where('user_id', '=', $deal->user_id)->take(1)->get(); //get profile details

        $count = BusinessProfile::incrementBrandViewCount($profile[0]); //increment the view count
        $profile[0] -> brand_hits = $count;
        $profile[0] -> save();

        $today = Carbon::now()->toDateString();
        // return($today);
        return view('frontpages.details')->with('today', $today)->with('deal', $deal);
    }

    
}

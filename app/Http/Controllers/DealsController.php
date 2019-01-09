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
        // get current date
        $today = Carbon::now()->toDateString();

        // check for expiration and rejections anf get data
        $deals = Advertisement::where('reject_flag', '=', 0)
                                // ->where('end_date', '>', $today)
                                ->inRandomOrder()->take(16)->get();

        
        
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
        
        // increment view by one and save back to relation
        $count = AdvertisementView::incrementViewCount($deal);
        $deal -> view_count = $count;
        $deal->save();

        //get profile details
        $profile = BusinessProfile::where('user_id', '=', $deal->user_id)->take(1)->get();

        //increment the brand view count
        $count = BusinessProfile::incrementBrandViewCount($profile[0]); 
        $profile[0] -> brand_hits = $count;
        $profile[0] -> save();

        // get current date
        $today = Carbon::now()->toDateString();
        
        return view('frontpages.details')->with('today', $today)->with('deal', $deal);
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\AdvertisementView;
use App\BusinessProfile;

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
        
        return view('frontpages.deals')->with('deals', $deals);
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

        $profile = BusinessProfile::where('user_id', '=', $deal->user_id)->take(1)->get();
        // return($profile[0]);
        $count = BusinessProfile::incrementBrandViewCount($profile[0]);
        $profile[0] -> brand_hits = $count;
        $profile[0] -> save();

        return view('frontpages.details')->with('deal', $deal);
    }

    
}

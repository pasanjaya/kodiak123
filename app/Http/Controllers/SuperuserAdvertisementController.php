<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\SuperuserAdvertisement;
use App\User;


class SuperuserAdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Advertisement::where('reject_flag', '=', 0)
                            ->where('verified_adv', '=', 0)
                            -> orderBy('updated_at', 'desc')->paginate(2);

        return view('/superuser.pages.superuserVerifyAdvertisement') -> with('ads', $ads);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ads = Advertisement::find($id);
        
        return view('/superuser.pages.superuserAdvertisementShow', compact('ads'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {

        $adv = Advertisement::find($request->id);

        $adv->verified_adv = 1;
        $adv->save();
        return redirect('/dashboard/verifyAd');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reject(Request $request)
    {
        $adv = Advertisement::find($request->id);
        $adv->reject_flag = 1;
        $adv->save();
        return redirect('/dashboard/verifyAd'); 
    }

    
}

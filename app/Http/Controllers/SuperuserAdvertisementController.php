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

        //$user_id = auth()->user()->id;
        
        // $ads = Advertisement::where('user_id', '=', $user_id)
        //                     ->where('reject_flag', '=', 0)
        //                     ->where('verified_adv', '=', 0)
        //                     -> orderBy('updated_at', 'desc')->paginate(2);

        
        $ads = Advertisement::where('reject_flag', '=', 0)
                            ->where('verified_adv', '=', 0)
                            -> orderBy('updated_at', 'desc')->paginate(2);

        //$user = User::find($user_id);

        return view('/superuser.pages.superuserVerifyAdvertisement') -> with('ads', $ads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //jshdkjsh
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // $user_id = auth()->user()->id;
        // $user = User::find($user_id);
        $id=$request->id;
        $ads = Advertisement::find($id);
        //dd($ads);
        // return view('/dashboard.pages.show')->with('ads', $ads)->with('profile', $user->profile);
        return view('/superuser.pages.superuserAdvertisementshow',compact('ads'));
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
        return($adv);
        // return($id);
        // $adv->verified_adv = 1;
        // $adv->save();
        // return redirect('/dashboard/verifyAd');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reject(Request $request, $id)
    {
        $adv = Advertisement::find($id);
        
        
    }

    
}

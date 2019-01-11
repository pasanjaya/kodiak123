<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Advertisement;
use App\User;
use App\AdvertisementView;
use Carbon\Carbon;

class AdvertisementController extends Controller
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // get user id
        $user_id = auth()->user()->id;
        
        // get advertisement which not rejected
        $ads = Advertisement::where('user_id', '=', $user_id)
                                ->where('reject_flag', '=', 0)
                                -> orderBy('updated_at', 'desc')->paginate(2);

        // rejected advertiesments
        $rejectads = Advertisement::where('user_id', '=', $user_id)
                            ->where('reject_flag', '=', 1)
                            -> orderBy('updated_at', 'desc')->paginate(2);
        
        // user details on current user
        $user = User::find($user_id);

        // get the current time
        $today = Carbon::now()->toDateString();

    
        return view('/dashboard.pages.offers')->with('ads', $ads)
                                        ->with('rejects', $rejectads)
                                        ->with('today', $today)
                                        ->with('profile', $user->profile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        return view('/dashboard.pages.create')->with('profile', $user->profile);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'title' => 'required',
            'tags' => 'required',
            'image' => 'image|required|max:1999',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        
        //image upload
        if($request -> hasfile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get just ext
            $extention = $request->file('image')->getClientOriginalExtension();

            //store file
            $filenameToStore = $filename.'_'.time().'_'.$extention;

            //Upload path
            $path = $request->file('image')->storeAs('public/advertisement_images',$filenameToStore);
        }

        // create advertisment

        $ad = new Advertisement;
        $ad -> title = $request->input('title');
        $ad -> subtitle = $request->input('subtitle');
        $ad -> description = $request->input('description');
        $ad -> tags = $request->input('tags');
        $ad -> image_name = $filenameToStore;
        $ad -> start_date = $request->input('start_date');
        $ad -> end_date = $request->input('end_date');
        $ad -> user_id = auth()->user()->id;

        // get category id form business profile
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $ad -> category_id = intval($user->profile->category);
        $ad -> reject_flag = 0;
        $ad -> verified_adv = 0;
        $ad -> view_count = 0;
        $ad -> save();

        $adView = new AdvertisementView();

        return redirect('/dashboard/offers')->with('success', 'Advertisement post successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
         $user_id = auth()->user()->id;
         $user = User::find($user_id);

        //  get total count
         $userAds = Advertisement::where('user_id', '=', $user_id);
        
         // get correct ad
         $ads = Advertisement::find($id);
        
        // calculate the presentage
        $presentage = (intval($ads->view_count)/intval($userAds->sum('view_count')))*100;
        

         return view('/dashboard.pages.show')->with('ads', $ads)
                                ->with('profile', $user->profile)
                                ->with('presentage', $presentage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $ads = Advertisement::find($id);
        return view('/dashboard.pages.edit')->with('ads', $ads)->with('profile', $user->profile);
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
        $this -> validate($request, [
            'title' => 'required',
            'tags' => 'required',
            'image' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        //Update image
        if($request -> hasfile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get just ext
            $extention = $request->file('image')->getClientOriginalExtension();

            //store file
            $filenameToStore = $filename.'_'.time().'_'.$extention;

            //Upload path
            $path = $request->file('image')->storeAs('public/advertisement_images',$filenameToStore);
        }

        // update advertisment

        $ad = Advertisement::find($id);
        $ad -> title = $request->input('title');
        $ad -> subtitle = $request->input('subtitle');
        $ad -> description = $request->input('description');
        $ad -> tags = $request->input('tags');
        if($request -> hasfile('image')){
            $ad -> image_name = $filenameToStore;
        }
        $ad -> start_date = $request->input('start_date');
        $ad -> end_date = $request->input('end_date');
        
        // after every update admin will have to review the adv. 
        $ad -> reject_flag = 0;
        $ad -> verified_adv = 0;
        $ad -> view_count = 0;
        $ad -> save();

        return redirect('/dashboard/offers')->with('success', 'Advertisement updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Advertisement::find($id);

        //remove requested advertisement from storage folder
        Storage::delete('public/advertisement_images/'.$ad->image_name);

        // execute the delete 
        $ad->delete();
        
        // redircet to offer page with alert message
        return redirect('/dashboard/offers')->with('success', 'Advertisement Deleted successfully!');
    }
}

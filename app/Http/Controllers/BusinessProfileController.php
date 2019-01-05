<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\BusinessProfile;
use App\AdvertiesmentCategory;
use App\User;

class BusinessProfileController extends Controller
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
        // $barnd = BusinessProfile::all();
        $user_id = auth()->user()->id;
        $brand = BusinessProfile::where('user_id', '=', $user_id)->take(1)->get();
        
        $user = User::find($user_id);
        
        // return($brand[0]);

        return view('/dashboard.pages.profile')->with('brand', $brand)->with('profile', $user->profile);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = AdvertiesmentCategory::pluck('category_name', 'category_id');

        return view('/dashboard.pages.createprofile')->with('category', $category);
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
            'image_name' => 'image|required|max:1999',
            'reg_name' => 'required|string|unique:business_profiles,reg_name|max:255',
            'reg_no' => 'required|string|unique:business_profiles,reg_no|max:255',
            'category' => 'required',
            // 'sub_category' => 'required',
            'street' => 'required|max:255',
            'city' => 'required|max:255',
            'tel' => 'required',
            'business_email' => 'required|email|unique:business_profiles,business_email',
            'inq_mail' => 'required|email|unique:business_profiles,inq_mail'
        ]);
        
        //image upload
        if($request -> hasfile('image_name')){
            $filenameWithExt = $request->file('image_name')->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get just ext
            $extention = $request->file('image_name')->getClientOriginalExtension();

            //store file
            $filenameToStore = $filename.'_'.time().'_'.$extention;

            //Upload path
            $path = $request->file('image_name')->storeAs('public/brand_logos',$filenameToStore);
        } else{
            $filenameToStore = 'noLogo.png';
        }

        $brand = new BusinessProfile;
        $brand -> user_id = auth()->user()->id;
        $brand -> reg_name = $request->input('reg_name');
        $brand -> reg_no = $request->input('reg_no');
        $brand -> category = $request->input('category');
        // $brand -> sub_category = $request->input('sub_category');
        $brand -> about = $request->input('about');
        $brand -> image_name = $filenameToStore;
        $brand -> street = $request->input('street');
        $brand -> city = $request->input('city');
        $brand -> tel = $request->input('tel');
        $brand -> url = $request->input('url');
        $brand -> business_email = $request->input('business_email');
        $brand -> inq_mail = $request->input('inq_mail');
        $brand -> brand_hits = 0;
        $brand -> save();

        return redirect('/dashboard')->with('success', 'Registration success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}

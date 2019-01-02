<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\BusinessProfile;

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
        $brand = BusinessProfile::all()->where('user_id', '=', auth()->user()->id);
        
        // foreach($barnd as $row){
        //     echo $row->id;
        // }
        // return($brand);
        // return(auth()->user()->id);

        return view('/dashboard.pages.profile') -> with('brand', $brand);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/dashboard.pages.createprofile');
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
            'reg_name' => 'required',
            'reg_no' => 'required',
            // 'category' => 'required',
            // 'sub_category' => 'required',
            'street' => 'required',
            'city' => 'required',
            'tel' => 'required',
            'business_email' => 'required',
            'inq_mail' => 'required'
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
        $brand -> sub_category = $request->input('sub_category');
        $brand -> about = $request->input('about');
        $brand -> image_name = $filenameToStore;
        $brand -> street = $request->input('street');
        $brand -> city = $request->input('city');
        $brand -> tel = $request->input('tel');
        $brand -> url = $request->input('url');
        $brand -> business_email = $request->input('business_email');
        $brand -> inq_mail = $request->input('inq_mail');
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

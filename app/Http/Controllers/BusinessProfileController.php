<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\BusinessProfile;
use App\AdvertiesmentCategory;
use App\User;
use App\Advertisement;

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
        $user_id = auth()->user()->id;
        
        $user = User::find($user_id);
        
        // create category array with category name and id
        $category = AdvertiesmentCategory::pluck('category_name', 'category_id');

        return view('/dashboard.pages.profile')->with('profile', $user->profile)
                                            ->with('category', $category);

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
            'image_name' => 'image|max:1999',
            'reg_name' => 'required|string|unique:business_profiles,reg_name|max:255',
            'reg_no' => 'required|string|unique:business_profiles,reg_no|max:255',
            'category' => 'required',
            'street' => 'required|max:255',
            'city' => 'required|max:255',
            'tel' => 'required|regex:/(94)[0-9]{9}+$/',
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
            $filenameToStore = 'nopic.jpg';
        }

        // create new busnessprofile object and store data in to it
        $brand = new BusinessProfile;
        $brand -> user_id = auth()->user()->id;
        $brand -> reg_name = $request->input('reg_name');
        $brand -> reg_no = $request->input('reg_no');
        $brand -> category = $request->input('category');
        $brand -> about = $request->input('about');
        $brand -> image_name = $filenameToStore;
        $brand -> street = $request->input('street');
        $brand -> city = $request->input('city');
        $brand -> tel = $request->input('tel');
        $brand -> url = $request->input('url');
        $brand -> business_email = $request->input('business_email');
        $brand -> inq_mail = $request->input('inq_mail');
        $brand -> brand_hits = 0;
        $brand -> subscribe_count = 0;
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
        // view the business profile
        // to be done 
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
        // return($request);
        $this -> validate($request, [
            'image_name' => 'image|max:1999',
            'reg_name' => "required|string|max:255|unique:business_profiles,reg_name,$id",
            'reg_no' => "required|string|unique:business_profiles,reg_no,$id|max:255",
            'category' => 'required',
            'street' => 'required|max:255',
            'city' => 'required|max:255',
            'tel' => 'required|regex:/(94)[0-9]{9}+$/',
            'business_email' => "required|email|unique:business_profiles,business_email,$id",
            'inq_mail' => "required|email|unique:business_profiles,inq_mail,$id"
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
            $filenameToStore = 'nopic.jpg';
        }

        //take the current data row
        $brand = BusinessProfile::find($id);
        $brand -> user_id = auth()->user()->id;
        $brand -> reg_name = $request->input('reg_name');
        $brand -> reg_no = $request->input('reg_no');
        $brand -> category = $request->input('category');
        $brand -> about = $request->input('about');
        $brand -> image_name = $filenameToStore;
        $brand -> street = $request->input('street');
        $brand -> city = $request->input('city');
        $brand -> tel = $request->input('tel');
        $brand -> url = $request->input('url');
        $brand -> business_email = $request->input('business_email');
        $brand -> inq_mail = $request->input('inq_mail');

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $brand -> brand_hits = $user->profile->brand_hits;
        $brand -> subscribe_count = $user->profile->subscribe_count;
        $brand -> save();

        return redirect('/dashboard')->with('success', 'Updation success!');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this -> validate($request, [
            'password' => 'required|min:6|string'
        ]);

        $user = User::find($id);
        // check the hash password is correct or not
        if(Hash::check($request->password, $user->password)){
            $profile = BusinessProfile::where('user_id', '=', $id)->get();
            $ads = Advertisement::where('user_id', '=', $id)->get();

            foreach($ads as $adv){
                Storage::delete('public/advertisement_images/'.$adv->image_name);
                $adv->delete();
            }

            if($user->profile->image_name != 'nopic.jpg'){
                Storage::delete('public/brand_logos/'.$user->profile->image_name);
            }
            $profile->each->delete();
            $user->delete();
            return redirect('/login');

        } 
        // if not correct send a message and redirect to the path
        else{
            $validator = Validator::make([], []);
            $validator->errors()->add('password', 'Password is incorrect! ');
            return redirect('/dashboard/profile')->withErrors($validator)->withInput();
        }
        
    }
}

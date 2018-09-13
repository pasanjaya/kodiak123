<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $ads = Advertisement::all();
        // return Advertisement::where('title', 'Basic Tube Top')->get();
        // $ads = Advertisement::orderBy('updated_at', 'desc')->take(1)->get(); 
        // $ads = Advertisement::orderBy('updated_at', 'desc')->get();
        $ads = Advertisement::orderBy('updated_at', 'desc')->paginate(2);
        // return($ads);
        // return view('/frontpages.index') -> with('ads', $ads);
        return view('/pages.offers') -> with('ads', $ads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
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
            'image' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        // create advertisment

        $ad = new Advertisement;
        $ad -> title = $request->input('title');
        $ad -> subtitle = $request->input('subtitle');
        $ad -> description = $request->input('description');
        $ad -> tags = $request->input('tags');
        $ad -> image_name = 'test image';
        $ad -> start_date = $request->input('start_date');
        $ad -> end_date = $request->input('end_date');
        $ad -> save();

        return redirect('/offers')->with('success', 'Advertisement post successfuly!');

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
        return view('pages.show')->with('ads', $ads);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ads = Advertisement::find($id);
        return view('pages.edit')->with('ads', $ads);
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

        // update advertisment

        $ad = Advertisement::find($id);
        $ad -> title = $request->input('title');
        $ad -> subtitle = $request->input('subtitle');
        $ad -> description = $request->input('description');
        $ad -> tags = $request->input('tags');
        $ad -> image_name = 'test image';
        $ad -> start_date = $request->input('start_date');
        $ad -> end_date = $request->input('end_date');
        $ad -> save();

        return redirect('/offers')->with('success', 'Advertisement updated successfuly!');
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
        $ad->delete();
        return redirect('/offers')->with('success', 'Advertisement Deleted successfuly!');
    }
}

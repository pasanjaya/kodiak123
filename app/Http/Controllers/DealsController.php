<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;

class DealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals = Advertisement::inRandomOrder()->take(16)->get();
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
        //
    }

    
}

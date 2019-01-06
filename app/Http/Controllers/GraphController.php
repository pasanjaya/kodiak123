<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GraphController extends Controller
{
    function index()
    {
        $data = DB::table('advertisements')
        ->select(
         DB::raw('category_id as category_id'),
         DB::raw('count(*) as number'))
        ->groupBy('category_id')
        ->get();
        $lable = DB::table('advertiesment_categories')
        ->select(
         DB::raw('category_name as category_name'))
         ->get();

      $array[] = ['category_id', 'number'];
      foreach($data as $key => $value)
      {   
       if($value->category_id == 1)$c = "Fashion & Clothing";
       else if($value->category_id == 2)$c="Food & Beverage";
       else if($value->category_id == 3)$c="Travel & Leisure";
       else if($value->category_id == 4)$c="Finance";
       else if($value->category_id == 5)$c="Product";

       $array[++$key] = [$c,$value->number];
      }

     
      
     
     

    
        $titles = DB::table('advertisements')->pluck('title');
        $count1=0;
        foreach ($titles as $title) {
             $count1++;
        }

        $titles = DB::table('users')->pluck('name');
        $count2=0;
        foreach ($titles as $title) {
             $count2++;
        }

        $titles = DB::table('advertiesment_categories')->pluck('category_name');
        $count3=0;
        foreach ($titles as $title) {
             $count3++;
        }

        $titles =DB::table('advertisements')->where('category_id', 1)->pluck('category_id');
        $count4=0;
        foreach ($titles as $title) {
             $count4++;
        }
        $titles =DB::table('advertisements')->where('category_id', 2)->pluck('category_id');
        $count5=0;
        foreach ($titles as $title) {
             $count5++;
        }
        $titles =DB::table('advertisements')->where('category_id', 3)->pluck('category_id');
        $count6=0;
        foreach ($titles as $title) {
             $count6++;
        }
        $titles =DB::table('advertisements')->where('category_id', 4)->pluck('category_id');
        $count7=0;
        foreach ($titles as $title) {
             $count7++;
        }
        $titles =DB::table('advertisements')->where('category_id', 5)->pluck('category_id');
        $count8=0;
        foreach ($titles as $title) {
             $count8++;
        }
        $titles =DB::table('advertisements')->where('reject_flag', 0)->pluck('reject_flag');
        $count9=0;
        foreach ($titles as $title) {
             $count9++;
        }
        $titles =DB::table('advertisements')->where('reject_flag', 1)->pluck('reject_flag');
        $count10=0;
        foreach ($titles as $title) {
             $count10++;
        }

        
        return view('superuser.pages.dashboardchart')->with('category', json_encode($array))
        ->with('ad', $count1)
        ->with('ue', $count2)
        ->with('ca', $count3)
        ->with('ca1', $count4)
        ->with('ca2', $count5)
        ->with('ca3', $count6)
        ->with('ca4', $count7)
        ->with('ca5', $count8)
        ->with('re0', $count9)
        ->with('re1', $count10);
        

       
 
    } 
}
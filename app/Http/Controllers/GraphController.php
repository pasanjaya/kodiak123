<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GraphController extends Controller
{
    function index()
    {
          //get  amount of advertisments categorywise 
          $data = DB::table('advertisements')
          ->select(
               DB::raw('category_id as category_id'),
               DB::raw('count(*) as number'))
          ->groupBy('category_id')
          ->get();

          //get categories
          $lable = DB::table('advertiesment_categories')
          ->select(
               DB::raw('category_name as category_name'))
          ->get();


          //create an array
          $array[] = ['category_id', 'number'];



          //get data to array using $data and $lable for pie chart
          foreach($data as $key1 => $value1)
          {
               $x=1;
               ++$key1;
               foreach($lable as $key => $value)
               {   
                    if($value1->category_id == $x)$category = $value->category_name;
                    $array[$key1] = [$category,$value1->number];
                    $x++;
               }
          }
       
      
     

          //get total advertisements from db
          $titles = DB::table('advertisements')->pluck('title');
          $count1=0;
          foreach ($titles as $title) 
          {
               $count1++;
          }

          //get total advertisers from db
          $titles = DB::table('users')->pluck('name');
          $count2=0;
          foreach ($titles as $title) 
          {
               $count2++;
          }

          //get total categories from db
          $titles = DB::table('advertiesment_categories')->pluck('category_name');
          $count3=0;
          foreach ($titles as $title) 
          {
               $count3++;
          }

       
          //pass data from db to blade 
          return view('superuser.pages.dashboardchart')->with('category', json_encode($array))
          ->with('advertisment', $count1)
          ->with('user', $count2)
          ->with('categories', $count3);
          
        

       
 
     } 
}
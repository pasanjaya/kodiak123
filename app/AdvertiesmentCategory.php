<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertiesmentCategory extends Model
{
    public function subCategory(){
        return $this -> hasMany('App\AdvertiesmentSubCategory', 'category_id', 'category_id');
    }
}

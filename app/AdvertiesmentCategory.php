<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertiesmentCategory extends Model
{
    //ORM to one to many relation this side is many of category and sub-category relation
    public function subCategory(){
        return $this -> hasMany('App\AdvertiesmentSubCategory', 'category_id', 'category_id');
    }
}

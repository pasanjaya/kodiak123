<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertiesmentSubCategory extends Model
{
    //ORM to one to many relation this side is one of category and sub-category relation
    public function category(){
        return $this->belongsTo('App\AdvertiesmentCategory', 'category_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertiesmentSubCategory extends Model
{
    public function category(){
        return $this->belongsTo('App\AdvertiesmentCategory', 'category_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessProfile extends Model
{
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public static function incrementBrandViewCount($profile){
        $currentCount = $profile->brand_hits;
        $count = $currentCount + 1;
        return $count;
    }
}

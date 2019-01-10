<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessProfile extends Model
{
    //ORM to one to one relation this side is one of user and business-profile relation
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    // increment brand view count by one
    public static function incrementBrandViewCount($profile){
        $currentCount = $profile->brand_hits;
        $count = $currentCount + 1;
        return $count;
    }
}

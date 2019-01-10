<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertisementView extends Model
{
    // get the advertisement row and increment count by one
    public static function incrementViewCount($adv){
        $count = intval($adv->view_count);
        $count = $count + 1;
        return $count;
    }
}

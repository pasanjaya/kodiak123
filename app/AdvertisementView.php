<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertisementView extends Model
{
    public static function incrementViewCount($adv){
        $count = intval($adv->view_count);
        $count = $count + 1;
        return $count;
    }
}

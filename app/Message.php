<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //remove automated timestamps and activate single timestamps only for created_at
    public $timestamps = false;
    protected $timestamp = ['created_at'];

}

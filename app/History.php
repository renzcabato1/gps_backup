<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
    protected $fillable  = ['id', 'history_id','device_id','altitude'
    ,'course'
    ,'latitude'
    ,'longtitude'
    ,'power'
    ,'speed'
    ,'time'
    ,'device_time'
    ,'server_time'
    ,'sensors_values'
    ,'valid'
    ,'distance'
    ,'protocol'
    ,'color'
    ,'item_id'
    ,'raw_time'
    ,'lat'
    ,'lng'];

}

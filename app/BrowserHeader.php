<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrowserHeader extends Model
{
    protected $guarded = [];

    public function locations()
    {
        return $this->hasMany('App\Locations', 'userAgent_id');
    }
    
    public function ip()
    {
        return $this->belongsTo('App\Ip', 'ip_id');
    }

    public function latestLocation()
    {
        return $this->hasOne('App\Locations', 'userAgent_id')->latest();
    }
}

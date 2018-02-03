<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $guarded = [];

    public function userAgent()
    {
        return $this->belongsTo('App\BrowserHeader', 'userAgent_id');
    }
}

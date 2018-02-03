<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    protected $guarded = [];

    public function userAgent()
    {
        return $this->hasMany('App\BrowserHeader', 'ip_id');
    }
}

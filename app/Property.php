<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function analyticTypes()
    {
        return $this->belongsToMany('App\AnalyticType');
    }
}

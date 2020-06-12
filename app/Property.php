<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['suburb', 'state', 'country'];

    public function analyticTypes()
    {
        return $this->belongsToMany('App\AnalyticType', 'property_analytics')->withPivot('value');
    }
}

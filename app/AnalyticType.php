<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalyticType extends Model
{
    public function properties()
    {
        return $this->belongsToMany('App\Properties');
    }
}

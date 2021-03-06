<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticType extends Model
{
    public function properties()
    {
        return $this->belongsToMany('App\Models\Properties');
    }
}

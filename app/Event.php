<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function problem()
    {
        return $this->belongsTo('App\Problem');
    }
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

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

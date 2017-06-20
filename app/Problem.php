<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $guarded = [];

    public function events()
    {
        return $this->hasMany('App\Event');
    }
}

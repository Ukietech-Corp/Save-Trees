<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}

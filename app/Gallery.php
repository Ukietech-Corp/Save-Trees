<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
		use SoftDeletes;
		
    public function user()
		{
		    return $this->belongsTo('App\User');
		}

		public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    protected $dates = ['deleted_at'];
}

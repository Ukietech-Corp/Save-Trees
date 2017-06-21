<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
		use SoftDeletes;
		
    public function gallery()
		{
		    return $this->belongsTo('App\Gallery');
		}

		protected $dates = ['deleted_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
	use SoftDeletes;
		
	public function gallery()
    {
        return $this->hasOne('App\Gallery');
    }

    public function files()
    {
        return $this->hasMany('App\File');
    }

    protected $dates = ['deleted_at'];
}

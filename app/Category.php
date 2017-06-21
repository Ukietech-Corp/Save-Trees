<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
		use SoftDeletes;
		
    public function parent()
		{
		    return $this->belongsTo('App\Category', 'parent_id');
		}

		public function children()
		{
		    return $this->hasMany('App\Category', 'parent_id');
		}

		public function articles()
    {
        return $this->hasMany('App\Article');
    }

    protected $dates = ['deleted_at'];
}

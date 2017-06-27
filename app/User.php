<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
  use SoftDeletes;

/**
 * The table associated with the model.
 *
 * @var string
 */

  protected $table = 'users';

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  /**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
 	 */

	protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at'
	];

  /**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
    
    public function achievements()
    {
    	return $this->hasMany('App\Achievement');
    }

    /**
     * One to One relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasOne
     */
	  public function gallery()
    {
        return $this->hasOne('App\Gallery');
    }

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function files()
    {
        return $this->hasMany('App\File');
    }
}

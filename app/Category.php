<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;
	
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Primary key of the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

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
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * self-reference relation
     *
     * @return Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function parent()
	{
	    return $this->belongsTo('App\Category', 'parent_id');
	}

    /**
     * self-reference relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
	public function children()
	{
	    return $this->hasMany('App\Category', 'parent_id');
	}

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
	public function articles()
    {
        return $this->hasMany('App\Article');
    }
}

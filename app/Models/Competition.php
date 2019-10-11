<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Competition
 * @package App\Models
 */
class Competition extends Model
{
    /**
     * @var string
     */
    protected $table = 'competition';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'from',
        'to',
        'difficulty',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->hasMany('App\Model\Activity');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function customers()
    {
        return $this->hasManyThrough('App\Model\Customer', 'App\Model\Activity');
    }
}



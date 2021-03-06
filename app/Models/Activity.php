<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Activity
 * @package App\Models
 */
class Activity extends Model
{
    /**
     * @var string
     */
    protected $table = 'activity';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'value',
        'from',
        'to',
        'type_id',
        'customer_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function activityType()
    {
        return $this->hasOne('App\Models\ActivityType', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customers()
    {
        return $this->hasOne('App\Models\Customer', 'id');
    }
}

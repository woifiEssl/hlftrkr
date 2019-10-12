<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ActivityType
 * @package App\Models
 */
class ActivityType extends Model
{
    /**
     * @var string
     */
    protected $table = 'activity_type';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'measure',
        'icon',
    ];
}

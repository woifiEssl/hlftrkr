<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * @package App\Models
 */
class Customer extends Model
{
    /**
     * @var string
     */
    protected $table = 'customer';

    /**
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'username',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->hasMany('App\Models\Activity');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function competitions()
    {
        return $this->belongsToMany('App\Models\Competition', 'customer_competition', 'customer_id', 'competition_id');
    }


}

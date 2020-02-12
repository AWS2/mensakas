<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property boolean $active
 * @property string $username
 * @property string $phone
 * @property string $created_at
 * @property string $updated_at
 * @property Delivery[] $deliveries
 * @property Location[] $locations
 */
class Rider extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'rider';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'active', 'username', 'phone', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveries()
    {
        return $this->hasMany('App\Delivery', 'riders_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locations()
    {
        return $this->hasOne('App\Location');
    }
}

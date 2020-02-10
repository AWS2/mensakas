<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $rider_id
 * @property float $latitude
 * @property float $longitude
 * @property float $accuracy
 * @property int $speed
 * @property string $created_at
 * @property string $updated_at
 * @property Rider $rider
 */
class Location extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'location';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['rider_id', 'latitude', 'longitude', 'accuracy', 'speed', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rider()
    {
        return $this->belongsTo('App\Rider');
    }
}

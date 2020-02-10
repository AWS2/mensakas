<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $business_id
 * @property boolean $day
 * @property string $open_1
 * @property string $close_1
 * @property string $open_2
 * @property string $close_2
 * @property string $created_at
 * @property string $updated_at
 * @property Business $business
 */
class Schedule extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'schedule';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['business_id', 'day', 'open_1', 'close_1', 'open_2', 'close_2', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business()
    {
        return $this->belongsTo('App\Business');
    }
}

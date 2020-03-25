<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $business_id
 * @property float $fixed_rate
 * @property float $percentage_rate
 * @property string $created_at
 * @property string $updated_at
 * @property Business $business
 */
class BusinessRate extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'business_rate';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['business_id', 'fixed_rate', 'percentage_rate', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business()
    {
        return $this->belongsTo('App\Business', 'business_id');
    }
}

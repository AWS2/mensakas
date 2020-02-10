<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $business_id
 * @property string $city
 * @property int $zip_code
 * @property string $street
 * @property int $number
 * @property string $created_at
 * @property string $updated_at
 * @property Business $business
 */
class BusinessAddress extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'business_address';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['business_id', 'city', 'zip_code', 'street', 'number', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business()
    {
        return $this->belongsTo('App\Business');
    }
}

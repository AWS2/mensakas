<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $temporal_product_id
 * @property integer $product_extra_id
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 * @property TemporalProduct $temporalProduct
 */
class TemporalProductExtras extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['temporal_product_id', 'product_extra_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_extra_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function temporalProduct()
    {
        return $this->belongsTo('App\TemporalProduct');
    }
}

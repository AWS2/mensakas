<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $riders_id
 * @property integer $order_id
 * @property string $delivery
 * @property string $created_at
 * @property string $updated_at
 * @property Order $order
 * @property Rider $rider
 */
class Delivery extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'delivery';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['riders_id', 'order_id', 'delivery', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rider()
    {
        return $this->belongsTo('App\Rider', 'riders_id');
    }
}

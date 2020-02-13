<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $order_status_id
 * @property integer $payment_id
 * @property integer $comanda_id
 * @property mixed $ticket_json
 * @property string $created_at
 * @property string $updated_at
 * @property Comanda $comanda
 * @property OrderStatus $orderStatus
 * @property Payment $payment
 * @property Delivery[] $deliveries
 */
class Order extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['order_status_id', 'payment_id', 'comanda_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comanda()
    {
        return $this->belongsTo('App\Comanda');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderStatus()
    {
        return $this->belongsTo('App\OrderStatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function delivery()
    {
        return $this->hasOne('App\Delivery');
    }
}

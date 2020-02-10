<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $payment_id
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property Payment $payment
 */
class Invoice extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'invoice';

    /**
     * @var array
     */
    protected $fillable = ['payment_id', 'id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }
}

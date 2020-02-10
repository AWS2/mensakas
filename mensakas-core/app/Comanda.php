<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $address_id
 * @property string $created_at
 * @property string $updated_at
 * @property CustomerAddress $customerAddress
 * @property ComandaProduct[] $comandaProducts
 * @property Order[] $orders
 */
class Comanda extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'comanda';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['address_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customerAddress()
    {
        return $this->belongsTo('App\CustomerAddress', 'address_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comandaProducts()
    {
        return $this->hasMany('App\ComandaProduct');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $customer_id
 * @property string $city
 * @property int $zip_code
 * @property string $street
 * @property int $number
 * @property string $house_number
 * @property string $created_at
 * @property string $updated_at
 * @property Customer $customer
 * @property Comanda[] $comandas
 */
class CustomerAddress extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'customer_address';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['customer_id', 'city', 'zip_code', 'street', 'number', 'house_number', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comandas()
    {
        return $this->hasOne('App\Comanda', 'address_id');
    }
}

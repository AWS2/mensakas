<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property int $phone
 * @property string $logo
 * @property string $image
 * @property boolean $active
 * @property string $created_at
 * @property string $updated_at
 * @property BusinessAddress[] $businessAddresses
 * @property BusinessCategory[] $businessCategories
 * @property Product[] $products
 * @property Schedule[] $schedules
 */
class Business extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'business';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'phone', 'logo', 'image', 'active', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businessAddresses()
    {
        return $this->hasMany('App\BusinessAddress');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businessCategories()
    {
        return $this->hasMany('App\BusinessCategory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }
}

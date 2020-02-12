<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Business
 * @package App\Models
 * @version February 12, 2020, 3:33 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection businessAddresses
 * @property \Illuminate\Database\Eloquent\Collection businessCategories
 * @property \Illuminate\Database\Eloquent\Collection products
 * @property \Illuminate\Database\Eloquent\Collection schedules
 * @property string name
 * @property integer phone
 * @property string logo
 * @property string image
 * @property boolean active
 */
class Business extends Model
{

    public $table = 'business';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'phone',
        'logo',
        'image',
        'active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'phone' => 'integer',
        'logo' => 'string',
        'image' => 'string',
        'active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'phone' => 'required',
        'active' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function businessAddresses()
    {
        return $this->hasMany(\App\Models\BusinessAddress::class, 'business_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function businessCategories()
    {
        return $this->hasMany(\App\Models\BusinessCategory::class, 'business_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'business_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function schedules()
    {
        return $this->hasMany(\App\Models\Schedule::class, 'business_id');
    }
}

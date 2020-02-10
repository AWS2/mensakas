<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $business_id
 * @property integer $main_product_id
 * @property float $price
 * @property boolean $avalible
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 * @property Business $business
 * @property Product $product
 * @property ComandaProduct[] $comandaProducts
 * @property ProductDescription[] $productDescriptions
 * @property ProductTag[] $productTags
 * @property TemporalProduct[] $temporalProducts
 * @property TemporalProductExtra[] $temporalProductExtras
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'product';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['business_id', 'main_product_id', 'price', 'avalible', 'image', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business()
    {
        return $this->belongsTo('App\Business');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'main_product_id');
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
    public function productDescriptions()
    {
        return $this->hasMany('App\ProductDescription');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productTags()
    {
        return $this->hasMany('App\ProductTag');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function temporalProducts()
    {
        return $this->hasMany('App\TemporalProduct');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function temporalProductExtras()
    {
        return $this->hasMany('App\TemporalProductExtra', 'product_extra_id');
    }
}

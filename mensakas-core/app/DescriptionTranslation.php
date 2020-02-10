<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $product_description_id
 * @property integer $language_id
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property Language $language
 * @property ProductDescription $productDescription
 */
class DescriptionTranslation extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'description_translation';

    /**
     * @var array
     */
    protected $fillable = ['product_description_id', 'language_id', 'id', 'name', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productDescription()
    {
        return $this->belongsTo('App\ProductDescription');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property ProductTag[] $productTags
 * @property TagTranslation[] $tagTranslations
 */
class Tag extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tag';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at'];

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
    public function tagTranslations()
    {
        return $this->hasMany('App\TagTranslation');
    }
}

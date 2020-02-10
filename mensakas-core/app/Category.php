<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property BusinessCategory[] $businessCategories
 * @property CategoryTranslation[] $categoryTranslations
 */
class Category extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'category';

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
    public function businessCategories()
    {
        return $this->hasMany('App\BusinessCategory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoryTranslations()
    {
        return $this->hasMany('App\CategoryTranslation');
    }
}

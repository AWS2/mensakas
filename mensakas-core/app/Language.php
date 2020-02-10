<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $language
 * @property string $created_at
 * @property string $updated_at
 * @property CategoryTranslation[] $categoryTranslations
 * @property DescriptionTranslation[] $descriptionTranslations
 * @property TagTranslation[] $tagTranslations
 */
class Language extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'language';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['language', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoryTranslations()
    {
        return $this->hasMany('App\CategoryTranslation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function descriptionTranslations()
    {
        return $this->hasMany('App\DescriptionTranslation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagTranslations()
    {
        return $this->hasMany('App\TagTranslation');
    }
}

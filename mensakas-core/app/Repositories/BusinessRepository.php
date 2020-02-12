<?php

namespace App\Repositories;

use App\Models\Business;
use App\Repositories\BaseRepository;

/**
 * Class BusinessRepository
 * @package App\Repositories
 * @version February 12, 2020, 3:33 pm UTC
*/

class BusinessRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'phone',
        'logo',
        'image',
        'active'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Business::class;
    }
}

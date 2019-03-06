<?php

namespace App\Repositories;

use App\Models\ItemType;
use App\Repositories\BaseRepository;

/**
 * Class ItemTypeRepository
 * @package App\Repositories
 * @version March 6, 2019, 11:02 pm UTC
*/

class ItemTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return ItemType::class;
    }
}

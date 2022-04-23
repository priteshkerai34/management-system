<?php

namespace App\Repositories;

use App\Models\items;
use App\Repositories\BaseRepository;

/**
 * Class itemsRepository
 * @package App\Repositories
 * @version April 12, 2022, 10:23 am UTC
*/

class itemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'items_url',
        'current_price',
        'Regular_price',
        'available_stock',
        'description',
        'item_visibility',
        'item_tax_category'
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
        return items::class;
    }
}

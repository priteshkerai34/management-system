<?php

namespace App\Repositories;

use App\Models\tax_category;
use App\Repositories\BaseRepository;

/**
 * Class tax_categoryRepository
 * @package App\Repositories
 * @version April 12, 2022, 11:17 am UTC
*/

class tax_categoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'tax_rate'
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
        return tax_category::class;
    }
}

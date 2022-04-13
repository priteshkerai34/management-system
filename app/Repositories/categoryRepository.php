<?php

namespace App\Repositories;

use App\Models\category;
use App\Repositories\BaseRepository;

/**
 * Class categoryRepository
 * @package App\Repositories
 * @version April 12, 2022, 7:38 am UTC
*/

class categoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name'
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
        return category::class;
    }
}

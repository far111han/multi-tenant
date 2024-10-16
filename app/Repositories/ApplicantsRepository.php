<?php

namespace App\Repositories;

use App\Models\applicants;
use App\Repositories\BaseRepository;

/**
 * Class ApplicantsRepository
 * @package App\Repositories
 * @version May 11, 2024, 6:31 am UTC
*/

class ApplicantsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'phone_number'
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
        return applicants::class;
    }
}

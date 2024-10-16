<?php

namespace App\Repositories;

use App\Models\TenantUser;
use App\Repositories\BaseRepository;

/**
 * Class TenantUserRepository
 * @package App\Repositories
 * @version October 16, 2024, 2:40 pm UTC
*/

class TenantUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'phone',
        'address',
        'gender'
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
        return TenantUser::class;
    }
}

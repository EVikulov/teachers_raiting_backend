<?php

namespace App\Repositories;

use RonasIT\Support\Repositories\BaseRepository;
use App\Models\Role;

/**
 * @property  Role $model
*/
class RoleRepository extends BaseRepository
{
    const ADMIN_ROLE = 1;
    const STUDENT_ROLE = 2;
    const TEACHER_ROLE = 3;

    public function __construct()
    {
        $this->setModel(Role::class);
    }

    public function search($filters)
    {
        return $this->searchQuery($filters)
            ->filterByQuery(['name'])
            ->getSearchResults();
    }
}
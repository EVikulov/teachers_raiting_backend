<?php

namespace App\Repositories;

use RonasIT\Support\Repositories\BaseRepository;
use App\Models\Groups;

/**
 * @property Groups $model
 */
class GroupsRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(Groups::class);
    }

    public function search($filters)
    {
        return $this->searchQuery($filters)
            ->filterByQuery(['name'])
            ->with()
            ->getSearchResults();
    }
}

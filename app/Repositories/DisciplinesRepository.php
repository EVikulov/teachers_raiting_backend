<?php

namespace App\Repositories;

use RonasIT\Support\Repositories\BaseRepository;
use App\Models\Disciplines;

/**
 * @property Disciplines $model
 */
class DisciplinesRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(Disciplines::class);
    }

    public function search($filters)
    {
        return $this->searchQuery($filters)
            ->filterByQuery(['name'])
            ->with()
            ->getSearchResults();
    }
}

<?php

namespace App\Repositories;

use RonasIT\Support\Repositories\BaseRepository;
use App\Models\Criterion;

/**
 * @property Criterion $model
 */
class CriterionRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(Criterion::class);
    }

    public function search($filters)
    {
        return $this->searchQuery($filters)
            ->filterByQuery(['name', 'question_group', 'number'])
            ->with()
            ->getSearchResults();
    }
}

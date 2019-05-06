<?php

namespace App\Repositories;

use RonasIT\Support\Repositories\BaseRepository;
use App\Models\Questionnaire;

/**
 * @property Questionnaire $model
 */
class QuestionnaireRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(Questionnaire::class);
    }

    public function search($filters)
    {
        return $this->searchQuery($filters)
            ->filterBy('rate')
            ->with()
            ->getSearchResults();
    }
}

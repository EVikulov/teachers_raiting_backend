<?php

namespace App\Services;

use App\Repositories\QuestionnaireRepository;
use RonasIT\Support\Services\EntityService;

/**
 * @property QuestionnaireRepository $repository
 */
class QuestionnaireService extends EntityService
{
    public function __construct()
    {
        $this->setRepository(QuestionnaireRepository::class);
    }
}

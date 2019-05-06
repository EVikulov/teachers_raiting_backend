<?php

namespace App\Services;

use App\Repositories\CriterionRepository;
use RonasIT\Support\Services\EntityService;

/**
 * @property CriterionRepository $repository
 */
class CriterionService extends EntityService
{
    public function __construct()
    {
        $this->setRepository(CriterionRepository::class);
    }
}

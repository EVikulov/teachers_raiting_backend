<?php

namespace App\Services;

use App\Repositories\DisciplinesRepository;
use RonasIT\Support\Services\EntityService;

/**
 * @property DisciplinesRepository $repository
 */
class DisciplinesService extends EntityService
{
    public function __construct()
    {
        $this->setRepository(DisciplinesRepository::class);
    }
}

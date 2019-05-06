<?php

namespace App\Services;

use App\Repositories\GroupsRepository;
use RonasIT\Support\Services\EntityService;

/**
 * @property GroupsRepository $repository
 */
class GroupsService extends EntityService
{
    public function __construct()
    {
        $this->setRepository(GroupsRepository::class);
    }
}

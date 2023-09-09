<?php

namespace App\UseCase\User;

use App\Entity\User;
use App\Service\User\FinderService;

class GetByIdHandler
{
    /**
     * @param FinderService $finderService
     */
    public function __construct(
        private readonly FinderService $finderService
    ) {
    }

    /**
     * @param int $id
     * @return User|null
     */
    public function handle(int $id): ?User
    {
        return $this->finderService->getById($id);
    }
}

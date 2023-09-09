<?php

namespace App\UseCase\User;

use App\Entity\User;
use App\Service\User\FinderService;

class GetAllHandler
{
    /**
     * @param FinderService $finderService
     */
    public function __construct(
        private readonly FinderService $finderService
    ) {
    }

    /**
     * @return User[]
     */
    public function handle(): array
    {
        return $this->finderService->getAll();
    }
}

<?php

namespace App\UseCase\Address;

use App\Entity\Address;
use App\Service\Address\FinderService;

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
     * @return Address[]
     */
    public function handle(): array
    {
        return $this->finderService->getAll();
    }
}

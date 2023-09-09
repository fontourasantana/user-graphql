<?php

namespace App\UseCase\Document;

use App\Entity\Document;
use App\Service\Document\FinderService;

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
     * @return Document[]
     */
    public function handle(): array
    {
        return $this->finderService->getAll();
    }
}

<?php

namespace App\UseCase\Document;

use App\Entity\Document;
use App\Service\Document\FinderService;

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
     * @return Document|null
     */
    public function handle(int $id): ?Document
    {
        return $this->finderService->getById($id);
    }
}

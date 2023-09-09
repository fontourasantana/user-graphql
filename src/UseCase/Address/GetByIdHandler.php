<?php

namespace App\UseCase\Address;

use App\Entity\Address;
use App\Service\Address\FinderService;

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
     * @return Address|null
     */
    public function handle(int $id): ?Address
    {
        return $this->finderService->getById($id);
    }
}

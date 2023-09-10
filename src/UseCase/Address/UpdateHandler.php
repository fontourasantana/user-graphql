<?php

namespace App\UseCase\Address;

use App\Entity\Address;
use App\Service\Address\UpdateService;
use App\Service\Address\FinderService;
use App\Factory\Dto\AddressDtoFactory;

class UpdateHandler
{
    /**
     * @param AddressDtoFactory $addressDtoFactory
     * @param FinderService $addressFinderService
     * @param UpdateService $addressUpdateService
     */
    public function __construct(
        private readonly AddressDtoFactory $addressDtoFactory,
        private readonly FinderService $addressFinderService,
        private readonly UpdateService $addressUpdateService
    ) {
    }

    /**
     * @param int $id
     * @param array $data
     * @return Address
     */
    public function handle(int $id, array $data): Address
    {
        /**
         * @todo: adicionar validação do input
         */
        return $this->addressUpdateService->update(
            $this->addressFinderService->getById($id),
            $this->addressDtoFactory->createUpdateAddress($data)
        );
    }
}

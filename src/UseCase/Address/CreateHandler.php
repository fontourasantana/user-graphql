<?php

namespace App\UseCase\Address;

use App\Entity\Address;
use App\Service\User\FinderService;
use App\Service\Address\CreateService;
use App\Factory\Dto\AddressDtoFactory;

class CreateHandler
{
    /**
     * @param AddressDtoFactory $addressDtoFactory
     * @param CreateService $addressCreateService
     * @param FinderService $userFinderService
     */
    public function __construct(
        private readonly AddressDtoFactory $addressDtoFactory,
        private readonly CreateService $addressCreateService,
        private readonly FinderService $userFinderService
    ) {
    }

    /**
     * @param array $data
     * @return Address
     */
    public function handle(array $data): Address
    {
        /**
         * @todo: adicionar validação do input
         */
        $addressDto = $this->addressDtoFactory->create($data);
        $addressDto->setUser($this->userFinderService->getById($data['user']));
        $address = $this->addressCreateService->create($addressDto);

        return $this->addressCreateService->save($address);
    }
}

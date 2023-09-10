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
     * @param int $userId
     * @param array $data
     * @return Address
     */
    public function handle(int $userId, array $data): Address
    {
        /**
         * @todo: adicionar validação do input
         */
        $user = $this->userFinderService->getById($userId);
        $addressDto = $this->addressDtoFactory->create($data);
        $address = $this->addressCreateService->create($addressDto);
        $address->setUser($user);

        return $this->addressCreateService->save($address);
    }
}

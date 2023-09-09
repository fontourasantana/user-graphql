<?php

namespace App\UseCase\Address;

use App\Entity\Address;
use App\Dto\AddressDto;
use App\Service\User\FinderService;
use App\Service\Address\CreateService;

class CreateHandler
{
    /**
     * @param CreateService $createService
     * @param FinderService $userFinderService
     */
    public function __construct(
        private readonly CreateService $createService,
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
         * @todo: adicionar mapper para passar dados do array para o dto
         */
        return $this->createService->create(
            (new AddressDto())
                ->setZipcode($data['zipcode'])
                ->setCity($data['city'])
                ->setNeighborhood($data['neighborhood'])
                ->setState($data['state'])
                ->setStreet($data['street'])
                ->setNumber($data['number'])
                ->setComplement($data['complement'])
                ->setLatitude($data['latitude'])
                ->setLongitude($data['longitude'])
                ->setUser($this->userFinderService->getById($data['user']))
        );
    }
}

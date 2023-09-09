<?php

namespace App\UseCase\Address;

use App\Entity\Address;
use App\Dto\AddressDto;
use App\Service\Address\UpdateService;
use App\Service\Address\FinderService;

class UpdateHandler
{
    /**
     * @param FinderService $finderService
     * @param UpdateService $updateService
     */
    public function __construct(
        private readonly FinderService $finderService,
        private readonly UpdateService $updateService
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
         * @todo: adicionar mapper para passar dados do array para o dto
         */
        return $this->updateService->update(
            $this->finderService->getById($id),
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
        );
    }
}

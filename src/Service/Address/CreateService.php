<?php

namespace App\Service\Address;

use App\Entity\Address;
use App\Repository\AddressRepository;

class CreateService
{
    /**
     * @param AddressRepository $repository
     */
    public function __construct(
        private readonly AddressRepository $repository
    ) {
    }

    /**
     * @param CreateAddressInterface $createAddress
     * @return Address
     */
    public function create(
        CreateAddressInterface $createAddress
    ): Address {
        /**
         * @todo: adicionar mapper para passar dados do dto para entidade
         */
        return $this->repository->save(
            (new Address())
                ->setZipcode($createAddress->getZipcode())
                ->setCity($createAddress->getNumber())
                ->setNeighborhood($createAddress->getNeighborhood())
                ->setState($createAddress->getState())
                ->setStreet($createAddress->getStreet())
                ->setNumber($createAddress->getNumber())
                ->setComplement($createAddress->getComplement())
                ->setLatitude($createAddress->getLatitude())
                ->setLongitude($createAddress->getLongitude())
                ->setUser($createAddress->getUser())
        );
    }
}

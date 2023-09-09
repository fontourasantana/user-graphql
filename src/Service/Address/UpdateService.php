<?php

namespace App\Service\Address;

use App\Entity\Address;
use App\Repository\AddressRepository;

class UpdateService
{
    /**
     * @param AddressRepository $repository
     */
    public function __construct(
        private readonly AddressRepository $repository
    ) {
    }

    /**
     * @param Address $address
     * @param UpdateAddressInterface $updateAddress
     * @return Address
     */
    public function update(
        Address $address,
        UpdateAddressInterface $updateAddress
    ): Address {
        /**
         * @todo: adicionar mapper para passar dados do dto para entidade
         */
        return $this->repository->save(
            $address
                ->setZipcode($updateAddress->getZipcode())
                ->setCity($updateAddress->getNumber())
                ->setNeighborhood($updateAddress->getNeighborhood())
                ->setState($updateAddress->getState())
                ->setStreet($updateAddress->getStreet())
                ->setNumber($updateAddress->getNumber())
                ->setComplement($updateAddress->getComplement())
                ->setLatitude($updateAddress->getLatitude())
                ->setLongitude($updateAddress->getLongitude())
        );
    }
}

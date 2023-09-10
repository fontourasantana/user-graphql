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
        return $this->repository->save(
            $address
                ->setZipcode($updateAddress->getZipcode())
                ->setCity($updateAddress->getCity())
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

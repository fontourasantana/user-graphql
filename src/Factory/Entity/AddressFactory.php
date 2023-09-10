<?php

namespace App\Factory\Entity;

use App\Entity\Address;
use App\Service\Address\CreateAddressInterface;

class AddressFactory
{
    /**
     * @param CreateAddressInterface $createAddress
     * @return Address
     */
    public function create(CreateAddressInterface $createAddress): Address
    {
        return (new Address())
            ->setZipcode($createAddress->getZipcode())
            ->setCity($createAddress->getCity())
            ->setNeighborhood($createAddress->getNeighborhood())
            ->setState($createAddress->getState())
            ->setStreet($createAddress->getStreet())
            ->setNumber($createAddress->getNumber())
            ->setComplement($createAddress->getComplement())
            ->setLatitude($createAddress->getLatitude())
            ->setLongitude($createAddress->getLongitude());
    }
}

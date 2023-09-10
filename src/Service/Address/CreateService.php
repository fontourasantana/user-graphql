<?php

namespace App\Service\Address;

use App\Entity\Address;
use App\Repository\AddressRepository;
use App\Factory\Entity\AddressFactory;

class CreateService
{
    /**
     * @param AddressRepository $addressRepository
     * @param AddressFactory $addressFactory
     */
    public function __construct(
        private readonly AddressRepository $addressRepository,
        private readonly AddressFactory $addressFactory
    ) {
    }

    /**
     * @param CreateAddressInterface $createAddress
     * @return Address
     */
    public function create(
        CreateAddressInterface $createAddress
    ): Address {
        return $this->addressFactory->create($createAddress);
    }

    /**
     * @param Address $address
     * @return Address
     */
    public function save(Address $address): Address
    {
        return $this->addressRepository->save($address);
    }
}

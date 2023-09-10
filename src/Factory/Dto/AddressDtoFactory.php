<?php

namespace App\Factory\Dto;

use App\Dto\AddressDto;

class AddressDtoFactory
{
    /**
     * @param array $address
     * @return AddressDto
     */
    public function create(
        array $address
    ): AddressDto {
        return (new AddressDto())
            ->setZipcode($address['zipcode'])
            ->setCity($address['city'])
            ->setNeighborhood($address['neighborhood'])
            ->setState($address['state'])
            ->setStreet($address['street'])
            ->setNumber($address['number'] ?? null)
            ->setComplement($address['complement'] ?? null)
            ->setLatitude($address['latitude'])
            ->setLongitude($address['longitude']);
    }

    /**
     * @param array $address
     * @return AddressDto
     */
    public function createUpdateAddress(
        array $address
    ): AddressDto {
        return $this->create($address);
    }
}

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
            ->setNumber($address['number'])
            ->setComplement($address['complement'])
            ->setLatitude($address['latitude'])
            ->setLongitude($address['longitude']);
    }
}

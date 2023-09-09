<?php

namespace App\Service\Address;

use App\Entity\User;

interface CreateAddressInterface extends UpdateAddressInterface
{
    /**
     * @return User
     */
    public function getUser(): User;
}

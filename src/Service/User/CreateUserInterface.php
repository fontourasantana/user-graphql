<?php

namespace App\Service\User;

use App\Service\Address\CreateAddressInterface;
use App\Service\Document\CreateDocumentInterface;

interface CreateUserInterface
{
    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @return string
     */
    public function getPassword(): string;

    /**
     * @return CreateAddressInterface
     */
    public function getAddress(): CreateAddressInterface;

    /**
     * @return CreateDocumentInterface
     */
    public function getDocument(): CreateDocumentInterface;
}

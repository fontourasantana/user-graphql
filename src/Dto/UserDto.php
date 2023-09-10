<?php

namespace App\Dto;

use App\Service\User\CreateUserInterface;
use App\Service\Address\CreateAddressInterface;
use App\Service\Document\CreateDocumentInterface;

class UserDto implements CreateUserInterface
{
    private string $email;
    private string $password;
    private CreateAddressInterface $address;
    private CreateDocumentInterface $document;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return UserDto
     */
    public function setEmail(string $email): UserDto
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return UserDto
     */
    public function setPassword(string $password): UserDto
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return CreateAddressInterface
     */
    public function getAddress(): CreateAddressInterface
    {
        return $this->address;
    }

    /**
     * @param CreateAddressInterface $address
     * @return UserDto
     */
    public function setAddress(CreateAddressInterface $address): UserDto
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return CreateDocumentInterface
     */
    public function getDocument(): CreateDocumentInterface
    {
        return $this->document;
    }

    /**
     * @param CreateDocumentInterface $document
     * @return UserDto
     */
    public function setDocument(CreateDocumentInterface $document): UserDto
    {
        $this->document = $document;
        return $this;
    }
}

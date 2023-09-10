<?php

namespace App\Factory\Dto;

use App\Dto\UserDto;

class UserDtoFactory
{
    /**
     * @param AddressDtoFactory $addressDtoFactory
     * @param DocumentDtoFactory $documentDtoFactory
     */
    public function __construct(
        private readonly AddressDtoFactory $addressDtoFactory,
        private readonly DocumentDtoFactory $documentDtoFactory
    ) {
    }

    /**
     * @param array $user
     * @return UserDto
     */
    public function create(
        array $user
    ): UserDto {
        return (new UserDto())
            ->setEmail($user['email'])
            ->setPassword($user['password'])
            ->setAddress($this->addressDtoFactory->create($user['address']))
            ->setDocument($this->documentDtoFactory->create($user['document']));
    }
}

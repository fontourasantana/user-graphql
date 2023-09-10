<?php

namespace App\UseCase\User;

use App\Dto\UserDto;
use App\Entity\User;
use App\Dto\AddressDto;
use App\Dto\DocumentDto;
use App\Service\User\CreateService as UserCreateService;
use App\Service\Address\CreateService as AddressCreateService;
use App\Service\Document\CreateService as DocumentCreateService;

class CreateHandler
{
    /**
     * @param UserCreateService $userCreateService
     * @param AddressCreateService $addressCreateService
     * @param DocumentCreateService $documentCreateService
     */
    public function __construct(
        private readonly UserCreateService $userCreateService,
        private readonly AddressCreateService $addressCreateService,
        private readonly DocumentCreateService $documentCreateService
    ) {
    }

    /**
     * @param array $data
     * @return User
     */
    public function handle(array $data): User
    {
        /**
         * @todo: adicionar validação do input
         * @todo: adicionar mapper para passar dados do array para o dto
         */
        $user = $this->userCreateService->create(
            (new UserDto())
                ->setEmail($data['email'])
                ->setPassword($data['password'])
        );

        $address = $this->addressCreateService->create(
            (new AddressDto())
                ->setZipcode($data['address']['zipcode'])
                ->setCity($data['address']['city'])
                ->setNeighborhood($data['address']['neighborhood'])
                ->setState($data['address']['state'])
                ->setStreet($data['address']['street'])
                ->setNumber($data['address']['number'])
                ->setComplement($data['address']['complement'])
                ->setLatitude($data['address']['latitude'])
                ->setLongitude($data['address']['longitude'])
                ->setUser($user)
        );

        $user->addAddress($address);

        $document = $this->documentCreateService->create(
            (new DocumentDto())
                ->setType($data['document']['type'])
                ->setNumber($data['document']['number'])
                ->setActive($data['document']['active'])
                ->setUser($user)
        );

        $user->addDocument($document);

        return $user;
    }
}

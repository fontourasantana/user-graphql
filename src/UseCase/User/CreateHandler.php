<?php

namespace App\UseCase\User;

use App\Entity\User;
use App\Factory\Dto\UserDtoFactory;
use App\Service\User\CreateService as UserCreateService;
use App\Service\Address\CreateService as AddressCreateService;
use App\Service\Document\CreateService as DocumentCreateService;

class CreateHandler
{
    /**
     * @param UserDtoFactory $userDtoFactory
     * @param UserCreateService $userCreateService
     * @param AddressCreateService $addressCreateService
     * @param DocumentCreateService $documentCreateService
     */
    public function __construct(
        private readonly UserDtoFactory $userDtoFactory,
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
         */
        $userDto = $this->userDtoFactory->create($data);
        $user = $this->userCreateService->create($userDto);
        $address = $this->addressCreateService->create($userDto->getAddress());
        $document = $this->documentCreateService->create($userDto->getDocument());
        $user->addAddress($address)
            ->addDocument($document);

        return $this->userCreateService->save($user);
    }
}

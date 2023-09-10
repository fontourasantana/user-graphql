<?php

namespace App\Service\User;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Factory\Entity\UserFactory;

class CreateService
{
    /**
     * @param UserRepository $userRepository
     * @param UserFactory $userFactory
     */
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly UserFactory $userFactory
    ) {
    }

    /**
     * @param CreateUserInterface $createUser
     * @return User
     */
    public function create(
        CreateUserInterface $createUser
    ): User {
        return $this->userFactory->create($createUser);
    }

    /**
     * @param User $user
     * @return User
     */
    public function save(User $user): User
    {
        return $this->userRepository->save($user);
    }
}

<?php

namespace App\Factory\Entity;

use App\Entity\User;
use App\Service\User\CreateUserInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFactory
{
    /**
     * @param UserPasswordHasherInterface $passwordHasher
     */
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher
    ) {
    }

    /**
     * @param CreateUserInterface $createUser
     * @return User
     */
    public function create(CreateUserInterface $createUser): User
    {
        $user = (new User())
            ->setEmail($createUser->getEmail());
        $user->setPassword(
            $this->passwordHasher->hashPassword($user, $createUser->getPassword())
        );

        return $user;
    }
}

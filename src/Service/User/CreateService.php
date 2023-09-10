<?php

namespace App\Service\User;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateService
{
    /**
     * @param UserRepository $repository
     * @param UserPasswordHasherInterface $passwordHasher
     */
    public function __construct(
        private readonly UserRepository $repository,
        private readonly UserPasswordHasherInterface $passwordHasher
    ) {
    }

    /**
     * @param CreateUserInterface $createUser
     * @return User
     */
    public function create(
        CreateUserInterface $createUser
    ): User {
        /**
         * @todo: adicionar mapper para passar dados do dto para entidade
         */
        $user = (new User())
            ->setEmail($createUser->getEmail());
        $user->setPassword(
            $this->passwordHasher->hashPassword($user, $createUser->getPassword())
        );

        return $this->repository->save($user);
    }
}

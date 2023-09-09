<?php

namespace App\Service\User;

use App\Entity\User;
use App\Repository\UserRepository;

class FinderService
{
    /**
     * @param UserRepository $repository
     */
    public function __construct(
        private readonly UserRepository $repository
    ) {
    }

    /**
     * @return User[]
     */
    public function getAll(): array
    {
        return $this->repository->findAll();
    }

    /**
     * @param int $id
     * @return User|null
     */
    public function getById(int $id): ?User
    {
        return $this->repository->find($id);
    }
}

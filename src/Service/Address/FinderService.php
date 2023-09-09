<?php

namespace App\Service\Address;

use App\Entity\Address;
use App\Repository\AddressRepository;

class FinderService
{
    /**
     * @param AddressRepository $repository
     */
    public function __construct(
        private readonly AddressRepository $repository
    ) {
    }

    /**
     * @return Address[]
     */
    public function getAll(): array
    {
        return $this->repository->findAll();
    }

    /**
     * @param int $id
     * @return Address|null
     */
    public function getById(int $id): ?Address
    {
        return $this->repository->find($id);
    }
}

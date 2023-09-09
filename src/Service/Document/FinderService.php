<?php

namespace App\Service\Document;

use App\Entity\Document;
use App\Repository\DocumentRepository;

class FinderService
{
    /**
     * @param DocumentRepository $repository
     */
    public function __construct(
        private readonly DocumentRepository $repository
    ) {
    }

    /**
     * @return Document[]
     */
    public function getAll(): array
    {
        return $this->repository->findAll();
    }

    /**
     * @param int $id
     * @return Document|null
     */
    public function getById(int $id): ?Document
    {
        return $this->repository->find($id);
    }
}

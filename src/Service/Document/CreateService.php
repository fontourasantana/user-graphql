<?php

namespace App\Service\Document;

use App\Entity\Document;
use App\Repository\DocumentRepository;

class CreateService
{
    /**
     * @param DocumentRepository $repository
     */
    public function __construct(
        private readonly DocumentRepository $repository
    ) {
    }

    /**
     * @param CreateDocumentInterface $createDocument
     * @return Document
     */
    public function create(
        CreateDocumentInterface $createDocument
    ): Document {
        /**
         * @todo: adicionar mapper para passar dados do dto para entidade
         */
        return $this->repository->save(
            (new Document())
                ->setType($createDocument->getType())
                ->setNumber($createDocument->getNumber())
                ->setActive($createDocument->isActive())
                ->setUser($createDocument->getUser())
        );
    }
}

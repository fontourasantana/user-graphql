<?php

namespace App\Service\Document;

use App\Entity\Document;
use App\Repository\DocumentRepository;

class UpdateService
{
    /**
     * @param DocumentRepository $repository
     */
    public function __construct(
        private readonly DocumentRepository $repository
    ) {
    }

    /**
     * @param Document $document
     * @param UpdateDocumentInterface $updateDocument
     * @return Document
     */
    public function update(
        Document $document,
        UpdateDocumentInterface $updateDocument
    ): Document {
        /**
         * @todo: adicionar mapper para passar dados do dto para entidade
         */
        return $this->repository->save(
            $document->setActive($updateDocument->isActive())
        );
    }
}

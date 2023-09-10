<?php

namespace App\Service\Document;

use App\Entity\Document;
use App\Repository\DocumentRepository;
use App\Factory\Entity\DocumentFactory;

class CreateService
{
    /**
     * @param DocumentRepository $documentRepository
     * @param DocumentFactory $documentFactory
     */
    public function __construct(
        private readonly DocumentRepository $documentRepository,
        private readonly DocumentFactory $documentFactory
    ) {
    }

    /**
     * @param CreateDocumentInterface $createDocument
     * @return Document
     */
    public function create(
        CreateDocumentInterface $createDocument
    ): Document {
        return $this->documentFactory->create($createDocument);
    }

    /**
     * @param Document $document
     * @return Document
     */
    public function save(Document $document): Document
    {
        return $this->documentRepository->save($document);
    }
}

<?php

namespace App\Factory\Entity;

use App\Entity\Document;
use App\Service\Document\CreateDocumentInterface;

class DocumentFactory
{
    /**
     * @param CreateDocumentInterface $createDocument
     * @return Document
     */
    public function create(CreateDocumentInterface $createDocument): Document
    {
        return (new Document())
            ->setType($createDocument->getType())
            ->setNumber($createDocument->getNumber())
            ->setActive($createDocument->isActive());
    }
}

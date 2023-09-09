<?php

namespace App\Repository;

use App\Entity\Document;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class DocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Document::class);
    }

    /**
     * @param Document $document
     * @return Document
     */
    public function save(Document $document): Document
    {
        $em = $this->getEntityManager();
        $em->persist($document);
        $em->flush();

        return $document;
    }
}

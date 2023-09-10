<?php

namespace App\Factory\Dto;

use App\Dto\DocumentDto;

class DocumentDtoFactory
{
    /**
     * @param array $document
     * @return DocumentDto
     */
    public function create(
        array $document
    ): DocumentDto {
        return (new DocumentDto())
            ->setType($document['type'])
            ->setNumber($document['number'])
            ->setActive($document['active']);
    }

    /**
     * @param array $document
     * @return DocumentDto
     */
    public function createUpdateDocument(
        array $document
    ): DocumentDto {
        return (new DocumentDto())
            ->setActive($document['active']);
    }
}

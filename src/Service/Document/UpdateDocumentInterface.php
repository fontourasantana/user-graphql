<?php

namespace App\Service\Document;

interface UpdateDocumentInterface
{
    /**
     * @return bool
     */
    public function isActive(): bool;
}

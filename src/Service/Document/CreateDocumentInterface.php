<?php

namespace App\Service\Document;

use App\Entity\User;

interface CreateDocumentInterface extends UpdateDocumentInterface
{
    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return string
     */
    public function getNumber(): string;

    /**
     * @return User
     */
    public function getUser(): User;
}

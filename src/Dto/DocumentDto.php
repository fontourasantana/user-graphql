<?php

namespace App\Dto;

use App\Entity\User;
use App\Service\Document\CreateDocumentInterface;

class DocumentDto implements CreateDocumentInterface
{
    private string $type;
    private string $number;
    private bool $active;
    private User $user;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return DocumentDto
     */
    public function setType(string $type): DocumentDto
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return DocumentDto
     */
    public function setNumber(string $number): DocumentDto
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return DocumentDto
     */
    public function setActive(bool $active): DocumentDto
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return DocumentDto
     */
    public function setUser(User $user): DocumentDto
    {
        $this->user = $user;
        return $this;
    }
}

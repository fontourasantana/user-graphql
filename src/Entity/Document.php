<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use App\Repository\DocumentRepository;

#[ORM\Entity(repositoryClass: DocumentRepository::class)]
#[Gedmo\SoftDeleteable]
class Document
{
    use TimestampableEntity;
    use SoftDeleteableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $type;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $number;

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => true])]
    private bool $active = true;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'documents')]
    private ?User $user;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Document
     */
    public function setType(string $type): Document
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
     * @return Document
     */
    public function setNumber(string $number): Document
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
     * @return Document
     */
    public function setActive(bool $active): Document
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return Document
     */
    public function setUser(?User $user): Document
    {
        $this->user = $user;
        return $this;
    }
}

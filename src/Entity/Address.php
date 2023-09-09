<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use App\Repository\AddressRepository;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
#[Gedmo\SoftDeleteable]
class Address
{
    use TimestampableEntity;
    use SoftDeleteableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 8)]
    private string $zipcode;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $city;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $neighborhood;

    #[ORM\Column(type: Types::STRING, length: 2)]
    private string $state;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $street;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $number = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $complement = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 6)]
    private string $latitude;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 6)]
    private string $longitude;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'addresses')]
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
    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    /**
     * @param string $zipcode
     * @return Address
     */
    public function setZipcode(string $zipcode): Address
    {
        $this->zipcode = $zipcode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Address
     */
    public function setCity(string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    /**
     * @param string $neighborhood
     * @return Address
     */
    public function setNeighborhood(string $neighborhood): Address
    {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return Address
     */
    public function setState(string $state): Address
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Address
     */
    public function setStreet(string $street): Address
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string|null $number
     * @return Address
     */
    public function setNumber(?string $number): Address
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComplement(): ?string
    {
        return $this->complement;
    }

    /**
     * @param string|null $complement
     * @return Address
     */
    public function setComplement(?string $complement): Address
    {
        $this->complement = $complement;
        return $this;
    }

    /**
     * @return string
     */
    public function getLatitude(): string
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     * @return Address
     */
    public function setLatitude(string $latitude): Address
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getLongitude(): string
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     * @return Address
     */
    public function setLongitude(string $longitude): Address
    {
        $this->longitude = $longitude;
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
     * @return Address
     */
    public function setUser(?User $user): Address
    {
        $this->user = $user;
        return $this;
    }
}

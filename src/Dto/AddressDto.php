<?php

namespace App\Dto;

use App\Entity\User;
use App\Service\Address\CreateAddressInterface;

class AddressDto implements CreateAddressInterface
{
    private string $zipcode;
    private string $city;
    private string $neighborhood;
    private string $state;
    private string $street;
    private ?string $number = null;
    private ?string $complement = null;
    private string $latitude;
    private string $longitude;
    private User $user;

    /**
     * @return string
     */
    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    /**
     * @param string $zipcode
     * @return AddressDto
     */
    public function setZipcode(string $zipcode): AddressDto
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
     * @return AddressDto
     */
    public function setCity(string $city): AddressDto
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
     * @return AddressDto
     */
    public function setNeighborhood(string $neighborhood): AddressDto
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
     * @return AddressDto
     */
    public function setState(string $state): AddressDto
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
     * @return AddressDto
     */
    public function setStreet(string $street): AddressDto
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
     * @return AddressDto
     */
    public function setNumber(?string $number): AddressDto
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
     * @return AddressDto
     */
    public function setComplement(?string $complement): AddressDto
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
     * @return AddressDto
     */
    public function setLatitude(string $latitude): AddressDto
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
     * @return AddressDto
     */
    public function setLongitude(string $longitude): AddressDto
    {
        $this->longitude = $longitude;
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
     * @return AddressDto
     */
    public function setUser(User $user): AddressDto
    {
        $this->user = $user;
        return $this;
    }
}

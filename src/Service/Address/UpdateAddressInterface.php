<?php

namespace App\Service\Address;

interface UpdateAddressInterface
{
    /**
     * @return string
     */
    public function getZipcode(): string;

    /**
     * @return string
     */
    public function getCity(): string;

    /**
     * @return string
     */
    public function getNeighborhood(): string;

    /**
     * @return string
     */
    public function getState(): string;

    /**
     * @return string
     */
    public function getStreet(): string;

    /**
     * @return string|null
     */
    public function getNumber(): ?string;

    /**
     * @return string|null
     */
    public function getComplement(): ?string;

    /**
     * @return string
     */
    public function getLatitude(): string;

    /**
     * @return string
     */
    public function getLongitude(): string;
}

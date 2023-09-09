<?php

namespace App\Repository;

use App\Entity\Address;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class AddressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Address::class);
    }

    /**
     * @param Address $address
     * @return Address
     */
    public function save(Address $address): Address
    {
        $em = $this->getEntityManager();
        $em->persist($address);
        $em->flush();

        return $address;
    }
}

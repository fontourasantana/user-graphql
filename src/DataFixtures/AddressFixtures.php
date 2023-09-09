<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Address;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AddressFixtures extends Fixture implements DependentFixtureInterface
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $manager->persist(
                $this->getFakeAddress()
            );
        }

        $manager->flush();
    }

    private function getFakeAddress(): Address
    {
        return (new Address())
            ->setZipcode($this->faker->postcode())
            ->setCity($this->faker->city())
            ->setNeighborhood($this->faker->firstName())
            ->setState('BA') // @todo: ver faker para state
            ->setStreet($this->faker->streetName())
            ->setNumber($this->faker->buildingNumber())
            ->setComplement($this->faker->streetSuffix())
            ->setLatitude($this->faker->latitude())
            ->setLongitude($this->faker->longitude())
            ->setUser($this->getReference(UserFixtures::REFERENCE));
    }

    /**
     * @return string[]
     */
    public function getDependencies(): array
    {
        return [
            UserFixtures::class
        ];
    }
}

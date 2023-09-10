<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Document;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class DocumentFixtures extends Fixture implements DependentFixtureInterface
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    /**
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $manager->persist(
                $this->getFakeDocument()
            );
        }

        $manager->flush();
    }

    /**
     * @return Document
     */
    private function getFakeDocument(): Document
    {
        /**
         * @todo: utilizar Document\CreateService
         */
        $documentTypes = ['RG', 'CPF', 'CNH', 'CNPJ'];

        return (new Document())
            ->setType($documentTypes[array_rand($documentTypes)])
            ->setNumber($this->faker->phoneNumber())
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

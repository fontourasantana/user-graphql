<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public const REFERENCE = 'USER_REFERENCE';

    private UserPasswordHasherInterface $passwordHasher;
    private Generator $faker;

    /**
     * @param UserPasswordHasherInterface $passwordHasher
     */
    public function __construct(
        UserPasswordHasherInterface $passwordHasher
    ) {
        $this->passwordHasher = $passwordHasher;
        $this->faker = Factory::create();
    }

    /**
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $manager->persist(
                $this->getFakeUser()
            );
        }

        $referenceUser = $this->getFakeUser();
        $this->addReference(self::REFERENCE, $referenceUser);

        $manager->persist($referenceUser);
        $manager->flush();
    }

    /**
     * @return User
     */
    private function getFakeUser(): User
    {
        $user = (new User())
            ->setEmail($this->faker->email());

        $user->setPassword(
            $this->passwordHasher->hashPassword($user, '123456')
        );

        return $user;
    }
}

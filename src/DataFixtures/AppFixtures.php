<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create("fr_FR");

        for ($i = 0; $i < 25; $i++) {
            $user = new User();
            $user
                ->setEmail($faker->email())
                ->setPassword($faker->password())
                ->setGenre($faker->randomElement(['Homme', 'Femme']))
                ->setLastname($faker->lastName())
                ->setFirstname($faker->firstName())
                ->setBirthdate($faker->dateTimeBetween('1900-1-1', '-18 years'));

            $manager->persist($user);
        }

        $manager->flush();
    }
}

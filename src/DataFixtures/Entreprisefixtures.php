<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Entreprise;


class Entreprisefixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for($i = 0 ; $i< 50 ; $i++) {
            $entreprise = new Entreprise();
            $entreprise->setDesignation($faker->company);
            $manager->persist($entreprise);

        }

        $manager->flush();
    }
}

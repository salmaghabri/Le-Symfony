<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\PFE; 
use App\Entity\Entreprise; 
class PfeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for($i = 0 ; $i< 50 ; $i++) {
            $repo = $manager->getRepository(\App\Entity\Entreprise::class);
            $entreprise =$repo->find($i);
            $pfe = new PFE();

            $pfe->setStudent($faker->name);
            $pfe->setTitle("PFE " . $i);
            $pfe->setEntreprise($entreprise);
            $manager->persist($pfe);
        }
        $manager->flush();

       
    }
}

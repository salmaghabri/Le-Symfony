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
        $repo = $manager->getRepository(\App\Entity\Entreprise::class);
       $entreprises=$repo->findAll();

        for($i = 1 ; $i< 20 ; $i++) {
            $pfe = new PFE();
            $num=rand(0,sizeof($entreprises));
            $pfe->setStudent($faker->name);
            $pfe->setTitle("PFE " . $i);
            $pfe->setEntreprise($entreprises[$num]);
            $manager->persist($pfe);

        }
        $manager->flush();

       
    }
}

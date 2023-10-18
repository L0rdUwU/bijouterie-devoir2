<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Categorie;
use App\Entity\Bijou;
use App\Entity\Location;
use App\Entity\Client;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CategorieFixtures extends Fixture implements DependentFixtureInterface
{
private $faker;

           public function __construct(){
                $this->faker = Factory::create("fr_FR");
           }


    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $categorie = new Categorie();
            $categorie->setNom($this->faker->word());
            $manager->persist($categorie);
        }
        $manager->flush();
    }
    public function getDependencies(){
        return [CategorieFixtures::class];
    }
}
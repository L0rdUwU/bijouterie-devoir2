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

class LocationFixtures extends Fixture implements DependentFixtureInterface
{

    private $faker;
    public function __construct(){
        $this->faker = Factory::create("fr_FR");
      }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $location = new Location();
            $location->setDateDebutLocation($this->faker->dateTime());
            $location->setDateDebutLocation($this->faker->dateTime());
            $manager->persist($location);
        }
        $manager->flush();
    }

    public function getDependencies(){
        return [ClientFixtures::class][BijouFixtures::class];
    }
}
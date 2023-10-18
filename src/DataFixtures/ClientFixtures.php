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

class ClientFixtures extends Fixture implements DependentFixtureInterface
{

    private $faker;
    public function __construct(){
        $this->faker = Factory::create("fr_FR");
      }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $client = new User();
            $client->setNom($this->faker->lastName());
            $client->setPrenom($this->faker->firstName());
            $client->setAdresseRue($this->faker->streetAdress());
            $client->setCodePostal($this->faker->departmentNumber());
            $client->setVille($this->faker->city());
            $client->setCouriel($this->faker->freeEmail());
            $client->setTelFixe($faker->phoneNumber());
            $client->setTelPortable($faker->mobileNumber());
            $manager->persist($client);
        }
        $manager->flush();
    }
    public function getDependencies(){
        return [ClientFixtures::class];
    }
}
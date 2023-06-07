<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Entity\CarCategory;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

    for ($i=0 ; $i < 10; $i++) {
        //On fait appel a la reference pour selectionner au hasard un id d'une voiture
        //On crée une nouvelle catégorie
        $category = new CarCategory();
        $category->setName($faker->word());
        $manager->persist($category);
        //On enregistre la categorie dans une référence me permettant de l'utiliser pour associé une voiture
        $this->addReference('category_'. $i, $category);


    }

    for ($i=0 ; $i < 30; $i++) {
        $car = new Car(); //On crée une nouvelle voiture
        $voiture= $this->getReference('category_'.$faker->numberBetween(0,9));

        $car->setNbSeats($faker->randomElement([4,5,6,7,8,9]));
        $car->setNbDoors($faker->randomElement([3,5]));
        $car->setName($faker->word());
        $car->setCost($faker->randomNumber(5));
        $car->setImage($faker->imageUrl(640, 480, 'Cars', true));
        $car->setCarCategory($voiture);
        
        $manager->persist($car);
    }
        $manager->flush();
        }
}

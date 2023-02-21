<?php

namespace App\DataFixtures;

use App\Entity\HoraireSettings;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
//use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory;
use Doctrine\Persistence\ObjectManager;
//use Generator;

class AppFixtures extends Fixture
{
    /**private Generator $faker;
    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }**/
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i = 50; $i > 0; $i--) {
        $hourSetting = new HoraireSettings();
        //$hourSetting->setName($this->faker->word())
        $hourSetting->setName("Horaire ATM")
            ->setDescription("Horaire Atelier Mecanique")
            ->setEntree(DateTime::createFromFormat("H:i:s", "08:00:00"))
            ->setExitBreak(DateTime::createFromFormat("H:i:s", "12:00:00"))
            ->setReturnBreak(DateTime::createFromFormat("H:i:s", "14:00:00"))
            ->setExitWork(DateTime::createFromFormat("H:i:s", "18:00:00"));
        $manager->persist($hourSetting);
        }
        $manager->flush();
    }
}

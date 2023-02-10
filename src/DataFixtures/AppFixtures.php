<?php

namespace App\DataFixtures;

use App\Entity\HoraireSettings;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $hourSetting = new HoraireSettings();
        $hourSetting->setName("Horaire ATM")
            ->setDescription("Horaire Atelier Mecanique")
            ->setEntree(DateTime::createFromFormat("H:i:s", "08:00:00"))
            ->setExitBreak(DateTime::createFromFormat("H:i:s", "12:00:00"))
            ->setReturnBreak(DateTime::createFromFormat("H:i:s", "14:00:00"))
            ->setExitWork(DateTime::createFromFormat("H:i:s", "18:00:00"));
        $manager->persist($hourSetting);
        $manager->flush();
    }
}

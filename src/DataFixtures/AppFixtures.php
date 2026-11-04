<?php

namespace App\DataFixtures;

use App\Entity\Hackathon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $hackathons = [];

        // create 5 hackathon with random dateHeureDebut
        for ($i = 0; $i < 5; $i++) {
            $hack = new Hackathon();
            $hack->setDateHeureDebut('08:00');
            $hack->setDateHeureFin('18:00');
            $hack->setLieu('Lycée ' . ($i + 1));
            $hack->setVille(['Paris', 'Lyon', 'Nantes', 'Lille', 'Bordeaux'][$i]);
            $hack->setTheme('Thème ' . ($i + 1));
            $manager->persist($hack);
            $hackathons[] = $hack;
        }

        $manager->flush();
    }
}

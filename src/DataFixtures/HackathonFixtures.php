<?php

namespace App\DataFixtures;

use App\Entity\Hackathon;
use App\Entity\Organisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HackathonFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $hack = new Hackathon();
            $hack->setDateHeureDebut(new \DateTime('now'));
            $hack->setDateHeureFin(new \DateTime('now'));
            //valorisation de l'organisateur
            $orgaId = random_int(0, OrganisateurFixtures::NB_ORGA - 1); //tirage aléatoire d'un id pour l'organisateur
            $orga = $this->getReference('organisateur_' . $orgaId, Organisateur::class); //récupération de l'organisateur en fonction de son id'
            $hack->setOrganisateur($orga);

            $manager->persist($hack);
        }
        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            OrganisateurFixtures::class,
        ];
    }
}

<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VenteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $produit1 = new Produit();
        $produit1
            ->setDenomination('voiture')
            ->setCode('7 11 654 876')
            ->setDateCreation(new \DateTime())
            ->setActif(true)
            ->setDescriptif('descriptif 11111')
            ->setManuel(null);      // inutile car valeur par défaut
        $manager->persist($produit1);


        $manuel2 = new Manuel();
        $manuel2
            ->setUrl('http://aaaaa')
            ->setSommaire('I titre; II pas titre');
        $manager->persist($manuel2);

        $produit2 = new Produit();
        $produit2
            ->setDenomination('skate')
            ->setCode('5 21 749 559')
            ->setDateCreation(new \DateTime())
            ->setActif(true)
            ->setDescriptif('descriptif 22222')
            ->setManuel($manuel2);
        $manager->persist($produit2);


        $produit3 = new Produit();
        $produit3
            ->setDenomination('vélo')
            ->setCode('2 45 814 445')
            ->setDateCreation(new \DateTime())
            ->setActif(false)
            ->setDescriptif('descriptif 33333')
            ->setManuel(null);      // inutile car valeur par défaut
        $manager->persist($produit3);


        $manuel4 = new Manuel();
        $manuel4
            ->setUrl('http://bbbb')
            ->setSommaire(null);
        $manager->persist($manuel4);

        $produit4 = new Produit();
        $produit4
            ->setDenomination('avion')
            ->setCode('8 44 783 712')
            ->setDateCreation(new \DateTime())
            ->setActif(true)
            ->setDescriptif('descriptif 44444')
            ->setManuel($manuel4);
        $manager->persist($produit4);


        $manager->flush();
    }
}

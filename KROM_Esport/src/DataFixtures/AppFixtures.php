<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Admin;

class AppFixtures extends Fixture
{
    // Ajout des membres autorisés à accéder au panel admin.
    public function load(ObjectManager $manager): void
    {
        $user1 = new Admin();
        $user1->setEmail("***********************");
        $user1->setPassword('**************************************************************');
        $user1->setRoles([]);
        $user1->setNom("******");
        $user1->setPrenom("******");
        $manager->persist($user1);

        $user2 = new Admin();
        $user2->setEmail("***********************");
        $user2->setPassword('**************************************************************');
        $user2->setRoles([]);
        $user2->setNom("******");
        $user2->setPrenom("******");
        $manager->persist($user2);

        $user3 = new Admin();
        $user3->setEmail("***********************");
        $user3->setPassword('**************************************************************');
        $user3->setRoles([]);
        $user3->setNom("******");
        $user3->setPrenom("******");
        $manager->persist($user3);

        $user4 = new Admin();
        $user4->setEmail("***********************");
        $user4->setPassword('**************************************************************');
        $user4->setRoles([]);
        $user4->setNom("******");
        $user4->setPrenom("******");
        $manager->persist($user4);

        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Projet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $Project = new Projet();
        $Project->setTitle('meilleureseriefrancaise.fr');
        $Project->setDescription('Un petit site pour voter pour la meilleure série
        francaise de tous les temps..');
        $Project->setGithub('...');
        $Project->setImage('meilleureseriefrancaise.png');
        $Project->setCategory('Site');
        $Project->setLink('https://meilleureseriefrancaise.fr');


        $manager->persist($Project);

        $Project = new Projet();
        $Project->setTitle('meilleureseriefrancaise.fr');
        $Project->setDescription('Un petit site pour voter pour la meilleure série
        francaise de tous les temps..');
        $Project->setGithub('...');
        $Project->setImage('meilleureseriefrancaise.png');
        $Project->setCategory('Site');
        $Project->setLink('https://meilleureseriefrancaise.fr');


        $manager->persist($Project);
        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Cv;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CvFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $Cv = new Cv();
        $Cv->setTitle("Formation Développeur web et web mobile");
        $Cv->setCompany("O'clock");
        $Cv->setStartDate("14 Septembre 2020");
        $Cv->setEndDate("04 Mars 2021");

        $manager->persist($Cv);

        $Cv2 = new Cv();
        $Cv2->setTitle("Formation Développeur web et web mobile");
        $Cv2->setCompany("O'clock");
        $Cv2->setStartDate("14 Septembre 2020");
        $Cv2->setEndDate("04 Mars 2021");

        $manager->persist($Cv2);

        $Cv3 = new Cv();
        $Cv3->setTitle("Formation Développeur web et web mobile");
        $Cv3->setCompany("O'clock");
        $Cv3->setStartDate("14 Septembre 2020");
        $Cv3->setEndDate("04 Mars 2021");

        $manager->persist($Cv3);

        $Cv4 = new Cv();
        $Cv4->setTitle("Formation Développeur web et web mobile");
        $Cv4->setCompany("O'clock");
        $Cv4->setStartDate("14 Septembre 2020");
        $Cv4->setEndDate("04 Mars 2021");

        $manager->persist($Cv4);

        $Cv5 = new Cv();
        $Cv5->setTitle("Formation Développeur web et web mobile");
        $Cv5->setCompany("O'clock");
        $Cv5->setStartDate("14 Septembre 2020");
        $Cv5->setEndDate("04 Mars 2021");

        $manager->persist($Cv5);



        $manager->flush();
    }
}

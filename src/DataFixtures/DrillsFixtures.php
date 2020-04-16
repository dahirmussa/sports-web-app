<?php

namespace App\DataFixtures;

use App\Entity\Drills;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DrillsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $d1 = new Drills();
        $d1->setName('21 cones');
        $d1->setType('shooting Drill');
        $manager->persist($d1);

        $d2 = new Drills();
        $d2->setName('chase down Layups');
        $d2->setType('shooting Drills');
        $manager->persist($d2);

        $d3 = new Drills();
        $d3->setName('pressure');
        $d3->setType('shooting Drills');
        $manager->persist($d3);
        
        $manager->flush();
    }
}

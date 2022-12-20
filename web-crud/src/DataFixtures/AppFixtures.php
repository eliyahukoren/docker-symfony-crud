<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Scooter;
use App\Entity\Project;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $projectsData = array(
            array(
                "Project",
                "First project"
            )
        );

        foreach ($projectsData as $p) {
            $project = new Project();
            $project->setName($p[0]);
            $project->setDescription($p[1]);
            $manager->persist($project);
        }

        $scootersData = array(
            array(
                "Tmax 560",
                "The newest TMAX Tech MAX also comes with an all-new compact body with a longer seat and footboards that give an even more comfortable ride.",
                2022
            ),
            array(
                "Xmax 450",
                "Yamaha has launched the 2022 XMax 250 maxi-scooter in the Japanese market.",
                2022
            ),

        );
        foreach ($scootersData as $s) {
            $scooter = new Scooter();
            $scooter->setName($s[0]);
            $scooter->setDescription($s[1]);
            $scooter->setYear($s[2]);
            $scooter->setPrice(mt_rand(10, 100));
            $manager->persist($scooter);
        }

        $manager->flush();
    }
}

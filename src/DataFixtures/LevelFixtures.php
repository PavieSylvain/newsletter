<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Level;

class LevelFixtures extends Fixture
{
    public const  LEVEL = "level.";
   // public const  LEVEL_2 = "level.2";
   // public const  LEVEL_3 = "level.3";

    public function load(ObjectManager $manager): void
    {
        $aLevel = [
            [
                //'reference' => self::LEVEL_1,
                'name' => 'level 1',
                'Description' => "Ceci est le level 1"
            ],
            [
               // 'reference' => self::LEVEL_2,
                'name' => 'level 2',
                'Description' => "Ceci est le level 2"
            ],
            [
               // 'reference' => self::LEVEL_3,
                'name' => 'level 3',
                'Description' => "Ceci est le level 3"
            ]
        ];

        $i = 0;
        foreach($aLevel as $level){
            $i++;
            $oLevel = new Level();
            $oLevel->setName($level["name"]);
            $oLevel->setDescription($level["Description"]);
            $manager->persist($oLevel);

            $this->referenceRepository->addReference(self::LEVEL . $i, $oLevel);
        }

        $manager->flush();
    }
}

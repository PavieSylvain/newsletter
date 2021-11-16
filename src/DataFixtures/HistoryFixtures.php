<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\History;

class HistoryFixtures extends Fixture
{
    public const HISTORY = "history.";

    public function load(ObjectManager $manager): void
    {
        $aHistory = [
            [
                'name' => 'history 1',
                'Description' => "Ceci est le history 1"
            ],
            [
                'name' => 'history 2',
                'Description' => "Ceci est le history 2"
            ],
            [
                'name' => 'history 3',
                'Description' => "Ceci est le history 3"
            ]
        ];

        $i = 0;
        foreach($aHistory as $history){
            $i++;
            $oHistory = new History();
            $oHistory->setName($history["name"]);
            $oHistory->setDescription($history["Description"]);
            $manager->persist($oHistory);

            $this->referenceRepository->addReference(self::HISTORY . $i, $oHistory);
        }

        $manager->flush();
    }
}

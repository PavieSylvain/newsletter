<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Group;

class GroupFixtures extends Fixture
{
    public const  GROUP = "groupe.";

    public function load(ObjectManager $manager): void
    {
        $aGroup = [
            [
                'name' => 'Groupe 1',
                'Description' => "Ceci est le groupe 1"
            ],
            [
                'name' => 'Groupe 2',
                'Description' => "Ceci est le groupe 2"
            ],
            [
                'name' => 'Groupe 3',
                'Description' => "Ceci est le groupe 3"
            ]
        ];

        $i = 0;
        foreach($aGroup as $group){
            $i++;
            $oGroup = new Group();
            $oGroup->setName($group["name"]);
            $oGroup->setDescription($group["Description"]);
            $manager->persist($oGroup);

            $this->referenceRepository->addReference(self::GROUP . $i, $oGroup);
        }

        $manager->flush();
    }
}

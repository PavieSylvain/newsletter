<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Profile;

class ProfileFixtures extends Fixture
{
    public const  PROFILE = "profile.";

    public function load(ObjectManager $manager): void
    {
        $aProfile = [
            [
                'name' => 'profile 1',
                'Description' => "Ceci est le profile 1"
            ],
            [
                'name' => 'profile 2',
                'Description' => "Ceci est le profile 2"
            ],
            [
                'name' => 'profile 3',
                'Description' => "Ceci est le profile 3"
            ]
        ];

        $i = 0;
        foreach($aProfile as $profile){
            $i++;
            $oProfile = new Profile();
            $oProfile->setName($profile["name"]);
            $oProfile->setDescription($profile["Description"]);
            $manager->persist($oProfile);

            $this->referenceRepository->addReference(self::PROFILE . $i, $oProfile);
        }


        $manager->flush();
    }
}

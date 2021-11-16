<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Civility;

class CivilityFixtures extends Fixture
{
    public const  CIVILITY = "civility.";

    public function load(ObjectManager $manager): void
    {
        $aCivility = [
            [
                'name' => 'Monsieur',
            ],
            [
                'name' => 'Madame',
            ],
            [
                'name' => 'Mademoiselle',
            ]
        ];

        $i = 0;
        foreach($aCivility as $civility){
            $i++;
            $oCivility = new Civility();
            $oCivility->setName($civility["name"]);
            $manager->persist($oCivility);

            $this->referenceRepository->addReference(self::CIVILITY . $i, $oCivility);
        }

        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Monolog\DateTimeImmutable;
use Symfony\Component\Validator\Constraints\Date;


class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public const GROUP = "groupe.";
    public const LEVEL = "level.";
    public const CIVILITY = "civility.";
    public const HISTORY = "history.";
    public const PROFILE = "profile.";
    public const USER = "user.";

    public function getDependencies(): array
    {
        return [
            CivilityFixtures::class,
            GroupFixtures::class,
            HistoryFixtures::class,
            LevelFixtures::class,
            ProfileFixtures::class,
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 0; $i < 45; $i++){ 
            $randGroup = rand(1, 3);
            $randLevel = rand(1, 3);
            $randCivility = rand(1, 3);
            $randHistory = rand(1, 3);
            $randProfile = rand(1, 3);
            $randStatus = rand(1, 3);
            $createdAt = DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-5 year', '-0 year'));
            $nowAt = new \DateTimeImmutable();
            $diffAt = $createdAt->diff($nowAt);
            $bornAt = $faker->dateTimeBetween('-80 year', '-18 year')->format('Y-m-d');
            $status = "";

            /* random status */
            switch ($randStatus) {
                case 1: $status = "membre"; break;
                case 2: $status = "vip"; break;
                case 3: $status = "ambassador"; break;
            }

            $aUser = [
                "password" => $faker->password(),
                "email" => $faker->email(),
                "firstname" => $faker->firstName(),
                "lastname" => $faker->lastName(),
                "cellphone" => $faker->mobileNumber(),
                "emailSponshorship" => $faker->email(),
                "bornAt" => $bornAt,
                "realEstateProjects" => $faker->word(),
                "bankDetails" => $faker->bankAccountNumber(),
                "description" => $faker->words(rand(10, 20), true),
                "isPickable" => true,
                "isPickableValidated" => true,
                "hasNewsletter" => $faker->boolean(),
                "siret" => $faker->siret(),
                "hasWaiver" => $faker->boolean(),
                "status" => $status,
                "isActive" => $faker->boolean(),
                "createdAt" => $createdAt,
                "updatedAt" => $faker->dateTimeBetween(' . $diffAt. ', '-0 year'),
                "group" => self::GROUP . rand(1, 3),
                "civility" => self::CIVILITY . rand(1, 3),
                "history" => self::HISTORY . rand(1, 3),
                "profile" => self::PROFILE . rand(1, 3),
                "level" => self::LEVEL . rand(1, 3),
            ];

            $oUser = new user();
            $oUser->setPassword($aUser["password"]);
            $oUser->setRoles(["ROLE_USER"]);
            $oUser->setEmail($aUser["email"]);
            $oUser->setAuthor(null);
            $oUser->setFirstname($aUser["firstname"]);
            $oUser->setLastname($aUser["lastname"]);
            $oUser->setCellphone($aUser["cellphone"]);
            $oUser->setEmailSponsorship($aUser["emailSponshorship"]);
            $oUser->setBornAt(new \DateTime($aUser["bornAt"]));
            $oUser->setRealEstateProjects($aUser["realEstateProjects"]);
            $oUser->setBankDetails($aUser["bankDetails"]);
            $oUser->setDescription($aUser["description"]);
            $oUser->setIsPickable($aUser["isPickable"]);
            $oUser->setIsPickableValidated($aUser["isPickableValidated"]);
            $oUser->setHasNewsletter($aUser["hasNewsletter"]);
            $oUser->setSiret($aUser["siret"]);
            $oUser->setHasWaiver($aUser["hasWaiver"]);
            $oUser->setStatus($aUser["status"]);
            $oUser->setIsActive($aUser["isActive"]);
            $oUser->setCreatedAt($aUser["createdAt"]);
            $oUser->setUpdatedAt($aUser["updatedAt"]);

            $oGroup = $this->getReference($aUser["group"]);
            $oUser->setGroup($oGroup);

            $oCivility = $this->getReference($aUser["civility"]);
            $oUser->setCivility($oCivility);

            $oHistory = $this->getReference($aUser["history"]);
            $oUser->setHistories($oHistory);

            $oProfile = $this->getReference($aUser["profile"]);
            $oUser->addProfile($oProfile);

            $oLevel = $this->getReference($aUser["level"]);
            $oUser->setLevel($oLevel);

            $manager->persist($oUser);

            $this->referenceRepository->addReference(self::USER . $i, $oUser);
        }
        $manager->flush();
    }
}

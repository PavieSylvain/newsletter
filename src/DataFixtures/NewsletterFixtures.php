<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\NewsLetter;
use Faker\Factory;
use Monolog\DateTimeImmutable;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NewsletterFixtures extends Fixture implements DependentFixtureInterface
{
    public const USER = "user.";
    public const NEWSLETTER = "newsletter.";

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }

    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 15; $i++){
            require_once 'vendor/autoload.php';
            $faker = Factory::create();
            $dateAt = $faker->dateTimeBetween('-120 week', '+0 week');

            if(rand(0, 1) == 0){
                $isActive = false;
                $deletedAt = DateTimeImmutable::createFromMutable($faker->dateTimeBetween($dateAt, '+0 week'));
            } else {
                $isActive = true;
                $deletedAt = null;
            }

            $aNewsletter = [
                "title" => "titre: " . $faker->words(rand(1, 5), true),
                "description" => "Déscription: " . $faker->text(rand(5, 8)),
                "createdAt" => DateTimeImmutable::createFromMutable($dateAt),
                "publishedAt" => DateTimeImmutable::createFromMutable($faker->dateTimeBetween($dateAt, '+0 week')),
                "updatedAt" => DateTimeImmutable::createFromMutable($faker->dateTimeBetween($dateAt, '+0 week')),
                "isActive" => $isActive,
                "deletedAt" => $deletedAt,
                "author" => UserFixtures::USER . rand(1, 5),
            ];
            $oNewsletter = new NewsLetter;

            $oNewsletter->setTitle($aNewsletter["title"]);
            $oNewsletter->setDescription($aNewsletter["description"]);

            $oNewsletter->setCreatedAt($aNewsletter["createdAt"]);
            $oNewsletter->setPublishedAt($aNewsletter["publishedAt"]);
            $oNewsletter->setUpdatedAt($aNewsletter["updatedAt"]);

            $oNewsletter->setIsActive($aNewsletter["isActive"]);
            $oNewsletter->setDeletedAt($aNewsletter["deletedAt"]);

            $oAuthor = $this->getReference($aNewsletter["author"]);
            $oNewsletter->setAuthor($oAuthor);
            

            $manager->persist($oNewsletter);

            $this->referenceRepository->addReference(self::NEWSLETTER . $i, $oNewsletter);
        }
        $manager->flush();
    }
}

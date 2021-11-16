<?php

namespace App\Repository;

use App\Entity\MailerPlanning;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MailerPlanning|null find($id, $lockMode = null, $lockVersion = null)
 * @method MailerPlanning|null findOneBy(array $criteria, array $orderBy = null)
 * @method MailerPlanning[]    findAll()
 * @method MailerPlanning[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MailerPlanningRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MailerPlanning::class);
    }

    // /**
    //  * @return MailerPlanning[] Returns an array of MailerPlanning objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MailerPlanning
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findByDateTime($dt)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.PlannedAt < :dt')
            ->setParameter('dt', $dt)
            ->orderBy('m.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
}

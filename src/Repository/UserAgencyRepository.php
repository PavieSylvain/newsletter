<?php

namespace App\Repository;

use App\Entity\UserAgency;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserAgency|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserAgency|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserAgency[]    findAll()
 * @method UserAgency[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserAgencyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserAgency::class);
    }

    // /**
    //  * @return UserAgency[] Returns an array of UserAgency objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserAgency
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

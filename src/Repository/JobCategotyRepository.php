<?php

namespace App\Repository;

use App\Entity\JobCategoty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JobCategoty|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobCategoty|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobCategoty[]    findAll()
 * @method JobCategoty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobCategotyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobCategoty::class);
    }

    // /**
    //  * @return JobCategoty[] Returns an array of JobCategoty objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JobCategoty
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

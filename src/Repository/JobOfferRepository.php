<?php

namespace App\Repository;

use App\Entity\JobOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JobOffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobOffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobOffer[]    findAll()
 * @method JobOffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobOffer::class);
    }

    // /**
    //  * @return JobOffer[] Returns an array of JobOffer objects
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
    public function findOneBySomeField($value): ?JobOffer
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    // ONLY SHOW THE FIRST TEN OFFERS IN HOME/INDEX
    public function findByTenLastOffer(){

        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT 
                job_offer,
                jobCategory
            FROM
                App\Entity\JobOffer job_offer

            JOIN job_offer.category jobCategory
            ORDER BY job_offer.createdAt DESC '
        )
            ->setMaxResults(10);
        return $query->getResult();
    }

    // /**
    // * returns all JobOffer per page
    // * @return void
    // */
    // public function getPaginatedOffer($page, $limit)
    // {
    //     $query = $this->createQueryBuilder('a')
    //     ->where('a.active = 1')
    // }
}

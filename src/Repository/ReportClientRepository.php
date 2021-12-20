<?php

namespace App\Repository;

use App\Entity\ReportClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ReportClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReportClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReportClient[]    findAll()
 * @method ReportClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReportClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReportClient::class);
    }

    // /**
    //  * @return ReportClient[] Returns an array of ReportClient objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReportClient
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

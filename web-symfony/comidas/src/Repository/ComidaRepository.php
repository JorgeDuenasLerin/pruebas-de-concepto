<?php

namespace App\Repository;

use App\Entity\Comida;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Comida|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comida|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comida[]    findAll()
 * @method Comida[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComidaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Comida::class);
    }

    // /**
    //  * @return Comida[] Returns an array of Comida objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Comida
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

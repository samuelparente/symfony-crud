<?php

namespace App\Repository;

use App\Entity\Paises;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Paises>
 *
 * @method Paises|null find($id, $lockMode = null, $lockVersion = null)
 * @method Paises|null findOneBy(array $criteria, array $orderBy = null)
 * @method Paises[]    findAll()
 * @method Paises[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaisesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Paises::class);
    }

    //    /**
    //     * @return Paises[] Returns an array of Paises objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Paises
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

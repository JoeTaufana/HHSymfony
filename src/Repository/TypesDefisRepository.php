<?php

namespace App\Repository;

use App\Entity\TypesDefis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypesDefis>
 *
 * @method TypesDefis|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypesDefis|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypesDefis[]    findAll()
 * @method TypesDefis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypesDefisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypesDefis::class);
    }

//    /**
//     * @return TypesDefis[] Returns an array of TypesDefis objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypesDefis
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

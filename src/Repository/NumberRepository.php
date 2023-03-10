<?php

namespace App\Repository;

use App\Entity\Number;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Number>
 *
 * @method Number|null find($id, $lockMode = null, $lockVersion = null)
 * @method Number|null findOneBy(array $criteria, array $orderBy = null)
 * @method Number[]    findAll()
 * @method Number[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NumberRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Number::class);
    }

    public function findAllUserNumber()
    {
        return $this->createQueryBuilder('n')
            ->select('n, u')
            ->join('n.user_number', 'u')
            ->getQuery()
            ->getResult()
            ;
    }

    public function save(Number $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Number $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Number[] Returns an array of Number objects
     */
    public function findByExampleField($value): array
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneBySomeField($value): ?Number
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}

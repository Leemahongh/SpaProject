<?php

namespace App\Repository;

use App\Entity\USERS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method USERS|null find($id, $lockMode = null, $lockVersion = null)
 * @method USERS|null findOneBy(array $criteria, array $orderBy = null)
 * @method USERS[]    findAll()
 * @method USERS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class USERSRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, USERS::class);
    }

    public function findAllUsers()
    {
        return $this->createQueryBuilder('p')
            ->where('p.admin = false')
            ->getQuery()
            ->getResult();
    }

    public function findAllAdmin()
    {
        return $this->createQueryBuilder('p')
            ->where('p.admin = true')
            ->getQuery()
            ->getResult();
    }




    // /**
    //  * @return USERS[] Returns an array of USERS objects
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
    public function findOneBySomeField($value): ?USERS
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

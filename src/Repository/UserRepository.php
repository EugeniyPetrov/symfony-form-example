<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\UserSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findUsers(UserSearch $request)
    {
        $qb = $this->createQueryBuilder('u')->select();
        if ($request->getName() !== '') {
            $qb
                ->andWhere("u.name LIKE :name")
                ->setParameter('name', "%" . $request->getName() . "%");
        }
        if ($request->getEmail() !== '') {
            $qb
                ->andWhere("u.email LIKE :email")
                ->setParameter('email', "%" . $request->getEmail() . "%");
        }

        return $qb
            ->setMaxResults($request->getItemsPerPage())
            ->setFirstResult(($request->getPage() - 1) * $request->getItemsPerPage())
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return User[] Returns an array of User objects
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
    public function findOneBySomeField($value): ?User
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

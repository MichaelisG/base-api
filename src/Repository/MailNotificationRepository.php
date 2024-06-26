<?php

namespace App\Repository;

use App\Entity\MailNotification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MailNotification>
 *
 * @method MailNotification|null find($id, $lockMode = null, $lockVersion = null)
 * @method MailNotification|null findOneBy(array $criteria, array $orderBy = null)
 * @method MailNotification[]    findAll()
 * @method MailNotification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MailNotificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MailNotification::class);
    }

    //    /**
    //     * @return MailNotification[] Returns an array of MailNotification objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('m.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?MailNotification
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

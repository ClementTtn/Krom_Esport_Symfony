<?php

namespace App\Repository;

use App\Entity\Calendrier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Calendrier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Calendrier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Calendrier[]    findAll()
 * @method Calendrier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalendrierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Calendrier::class);
    }

    // /**
    //  * @return Calendrier[] Returns an array of Calendrier objects
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
    public function findOneBySomeField($value): ?Calendrier
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    // Affichage de l'ensemble des dates du calendrier dans l'ordre croissant par rapport à la date de l'événement.
    public function findAllASC(): array{
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'SELECT * FROM calendrier ORDER BY date';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchAllAssociative();
    }
}

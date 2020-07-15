<?php

namespace App\Repository;

use App\Entity\Chambre;
use App\Entity\SearchChambre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Chambre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chambre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chambre[]    findAll()
 * @method Chambre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChambreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chambre::class);
    }

    // /**
    //  * @return Chambre[] Returns an array of Chambre objects
    //  */

    public function findByChambre( SearchChambre $search): Query
    {
        $query= $this->createQueryBuilder('c');

        if ($search->getNumchambre()){
            $query
                ->andWhere('c.numChambre = :numChambre')
                ->setParameter('numChambre', $search->getNumchambre());
        }
        if ($search->getType()){
            $query
                ->andWhere('c.type = :type')
                ->setParameter('type', $search->getType());
        }
        if ($search->getBatiment()){
            $query
                ->andWhere('c.batiment = :batiment')
                ->setParameter('batiment', $search->getBatiment());
        }
        return $query->getQuery();

    }

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
    public function findOneBySomeField($value): ?Chambre
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

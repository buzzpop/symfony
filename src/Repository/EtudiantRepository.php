<?php

namespace App\Repository;

use App\Entity\Etudiant;
use App\Entity\SearchEtudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Etudiant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Etudiant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Etudiant[]    findAll()
 * @method Etudiant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Etudiant::class);
    }

    // /**
    //  * @return Etudiant[] Returns an array of Etudiant objects
    //  */

    public function findByEtudiant( SearchEtudiant $search): Query
    {
        $query= $this->createQueryBuilder('e');

           if ($search->getMatricule()){
               $query
                   ->andWhere('e.matricule = :matricule')
                    ->setParameter('matricule', $search->getMatricule());
           }
        if ($search->getDepartement()){
            $query
                ->andWhere('e.departement = :departement')
            ->setParameter('departement', $search->getDepartement());
        }
        if ($search->getType()){
            $query
                ->andWhere('e.type = :type')
            ->setParameter('type', $search->getType());
        }
           return $query->getQuery();

    }



    /*
    public function findOneBySomeField($value): ?Etudiant
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

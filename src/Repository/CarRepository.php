<?php

namespace App\Repository;

use App\Entity\Car;
use App\Data\SearchData;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Car>
 *
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    public function save(Car $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Car $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//Gestion des requetes SQL pour filtrer les voitures selon plusieurs critères
public function findSearch(SearchData $data): array
    {
        $query = $this
            ->createQueryBuilder("c")
            ->select('c','g')
            ->leftJoin('c.CarCategory', 'g')
            ;
        //Requete SQL pour l'input de recherche
        if(!empty($data->search)){
            $query = $query 
                ->andWhere('c.name LIKE :search')
                ->setParameter('search', "%{$data->search}%");//Recherche partielle avec les "%"
        }
        //SQL du prix minimum
        if(!empty($data->min)){
            $query = $query 
                ->andWhere('c.cost >= :min')
                ->setParameter('min', $data->min);
        }
        //SQL du prix max
        if(!empty($data->max)){
            $query = $query 
                ->andWhere('c.cost <= :max')
                ->setParameter('max', $data->max);
        };

        if(!empty($data->categories)){
            $query = $query 
                ->andWhere('g.id IN (:categories)')
                ->setParameter('categories', $data->categories);
        }
        // dd($query);
        return $query->getQuery()->getResult();
        
    }


}

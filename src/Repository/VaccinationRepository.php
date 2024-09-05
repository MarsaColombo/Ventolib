<?php

namespace App\Repository;

use App\Entity\Vaccination;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\ORMException;

/**
 * @extends ServiceEntityRepository<Vaccination>
 */
class VaccinationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vaccination::class);
    }

    /**
     * Add a new Vaccination entity.
     *
     * @param Vaccination $entity
     * @param bool $flush
     * @throws ORMException
     */
    public function add(Vaccination $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Update an existing Vaccination entity.
     *
     * @param Vaccination $entity
     * @param bool $flush
     * @throws ORMException
     */
    public function update(Vaccination $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Remove a Vaccination entity.
     *
     * @param Vaccination $entity
     * @param bool $flush
     * @throws ORMException
     */
    public function remove(Vaccination $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Find a Vaccination by its ID.
     *
     * @param int $id
     * @return Vaccination|null
     */
    public function findById(int $id): ?Vaccination
    {
        return $this->find($id);
    }

    /**
     * Find all Vaccination entities.
     *
     * @return Vaccination[]
     */
    public function findAllVaccinations(): array
    {
        return $this->findAll();
    }

    /**
     * Find Vaccination entities by a specific field (custom method).
     *
     * @param mixed $value
     * @return Vaccination[]
     */
    // public function findByField($value): array
    // {
    //     return $this->createQueryBuilder('v')
    //         ->andWhere('v.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->orderBy('v.id', 'ASC')
    //         ->getQuery()
    //         ->getResult();
    // }

    /**
     * Find one Vaccination entity by a specific field.
     *
     * @param mixed $value
     * @return Vaccination|null
     */
    // public function findOneByField($value): ?Vaccination
    // {
    //     return $this->createQueryBuilder('v')
    //         ->andWhere('v.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->getQuery()
    //         ->getOneOrNullResult();
    // }
}

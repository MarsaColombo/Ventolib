<?php

namespace App\Repository;

use App\Entity\Medication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\ORMException;

/**
 * @extends ServiceEntityRepository<Medication>
 */
class MedicationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Medication::class);
    }

    /**
     * Add a new Medication entity.
     *
     * @param Medication $entity
     * @param bool $flush
     * @throws ORMException
     */
    public function add(Medication $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Update an existing Medication entity.
     *
     * @param Medication $entity
     * @param bool $flush
     * @throws ORMException
     */
    public function update(Medication $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Remove a Medication entity.
     *
     * @param Medication $entity
     * @param bool $flush
     * @throws ORMException
     */
    public function remove(Medication $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Find a Medication by its ID.
     *
     * @param int $id
     * @return Medication|null
     */
    public function findById(int $id): ?Medication
    {
        return $this->find($id);
    }

    /**
     * Find all Medication entities.
     *
     * @return Medication[]
     */
    public function findAllMedications(): array
    {
        return $this->findAll();
    }

    /**
     * Find Medication entities by a specific field (custom method).
     *
     * @param mixed $value
     * @return Medication[]
     */
    // public function findByField($value): array
    // {
    //     return $this->createQueryBuilder('m')
    //         ->andWhere('m.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->orderBy('m.id', 'ASC')
    //         ->getQuery()
    //         ->getResult();
    // }

    /**
     * Find one Medication entity by a specific field.
     *
     * @param mixed $value
     * @return Medication|null
     */
    // public function findOneByField($value): ?Medication
    // {
    //     return $this->createQueryBuilder('m')
    //         ->andWhere('m.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->getQuery()
    //         ->getOneOrNullResult();
    // }
}

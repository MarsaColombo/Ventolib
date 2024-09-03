<?php
namespace App\Repository;

use App\Entity\Animal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Animal::class);
    }

    /**
     * Persist and optionally flush an Animal entity.
     *
     * @param Animal $animal
     * @param bool $flush
     */
    public function save(Animal $animal, bool $flush = true): void
    {
        $this->_em->persist($animal);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * Remove and optionally flush an Animal entity.
     *
     * @param Animal $animal
     * @param bool $flush
     */
    public function delete(Animal $animal, bool $flush = true): void
    {
        $this->_em->remove($animal);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * Find an Animal by its ID.
     *
     * @param int $id
     * @return Animal|null
     */
    public function findById(int $id): ?Animal
    {
        return $this->find($id);
    }

    /**
     * Find all Animal entities.
     *
     * @return Animal[]
     */
    public function findAllAnimals(): array
    {
        return $this->findAll();
    }

    /**
     * Find animals by criteria.
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @param int|null $limit
     * @param int|null $offset
     * @return Animal[]
     */
    public function findByCriteria(array $criteria, ?array $orderBy = null, ?int $limit = null, ?int $offset = null): array
    {
        return $this->findBy($criteria, $orderBy, $limit, $offset);
    }
}

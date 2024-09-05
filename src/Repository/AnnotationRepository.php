<?php

namespace App\Repository;

use App\Entity\Annotation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @extends ServiceEntityRepository<Annotation>
 */
class AnnotationRepository extends ServiceEntityRepository
{
    private $entityManager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Annotation::class);
        $this->entityManager = $entityManager;
    }

    // CREATE: Save a new Annotation
    public function save(Annotation $annotation): void
    {
        $this->entityManager->persist($annotation);
        $this->entityManager->flush();
    }

    // READ: Find an Annotation by ID
    public function findById(int $id): ?Annotation
    {
        return $this->find($id);
    }

    // READ: Find all Annotations
    public function findAllAnnotations(): array
    {
        return $this->findAll();
    }

    // UPDATE: Update an existing Annotation
    public function update(): void
    {
        // No need to call persist() because Doctrine tracks changes in managed entities
        $this->entityManager->flush();
    }

    // DELETE: Remove an Annotation by ID
    public function delete(Annotation $annotation): void
    {
        $this->entityManager->remove($annotation);
        $this->entityManager->flush();
    }
}

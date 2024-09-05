<?php

namespace App\Repository;

use App\Entity\Consultation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @extends ServiceEntityRepository<Consultation>
 */
class ConsultationRepository extends ServiceEntityRepository
{
    private $entityManager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Consultation::class);
        $this->entityManager = $entityManager;
    }

    // CREATE: Save a new Consultation
    public function save(Consultation $consultation): void
    {
        $this->entityManager->persist($consultation);
        $this->entityManager->flush();
    }

    // READ: Find a Consultation by ID
    public function findById(int $id): ?Consultation
    {
        return $this->find($id);
    }

    // READ: Find all Consultations
    public function findAllConsultations(): array
    {
        return $this->findAll();
    }

    // UPDATE: Update an existing Consultation
    public function update(Consultation $consultation): void
    {   
        $this->entityManager->persist($consultation);
        $this->entityManager->flush();
    }

    // DELETE: Remove a Consultation by ID
    public function delete(Consultation $consultation): void
    {
        $this->entityManager->remove($consultation);
        $this->entityManager->flush();
    }
}

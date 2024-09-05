<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsultationRepository::class)]
class Consultation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $last_date = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $reasons = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $diagnosis = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $treatment = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\ManyToOne(targetEntity: Animal::class, inversedBy: 'consultations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $animal = null;

    public function __construct()
    {
        $this->created_at = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastDate(): ?\DateTimeInterface
    {
        return $this->last_date;
    }

    public function setLastDate(\DateTimeInterface $last_date): self
    {
        $this->last_date = $last_date;

        return $this;
    }

    public function getReasons(): ?string
    {
        return $this->reasons;
    }

    public function setReasons(string $reasons): self
    {
        $this->reasons = $reasons;

        return $this;
    }

    public function getDiagnosis(): ?string
    {
        return $this->diagnosis;
    }

    public function setDiagnosis(string $diagnosis): self
    {
        $this->diagnosis = $diagnosis;

        return $this;
    }

    public function getTreatment(): ?string
    {
        return $this->treatment;
    }

    public function setTreatment(string $treatment): self
    {
        $this->treatment = $treatment;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): self
    {
        $this->animal = $animal;

        return $this;
    }
}

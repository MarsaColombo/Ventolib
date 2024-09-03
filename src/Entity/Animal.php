<?php
namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", length: 255)]
    private $name;

    #[ORM\Column(type: "string", length: 255)]
    private $species;

    #[ORM\Column(type: "string", length: 255)]
    private $race;

    #[ORM\Column(type: "string", length: 255)]
    private $colour;

    #[ORM\Column(type: "string", length: 10)]
    private $gender;

    #[ORM\Column(type: "float")]
    private $weight;

    #[ORM\Column(type: "boolean")]
    private $sterilize;

    #[ORM\Column(type: "integer", unique: true, nullable: true)]
    private $tattooNumber;

    #[ORM\Column(type: "integer", unique: true, nullable: true)]
    private $chipNumber;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $picture;

    #[ORM\Column(type: "date")]
    private $birthDate;

    #[ORM\Column(type: "datetime")]
    private $createdAt;

    #[ORM\ManyToOne(targetEntity: "App\Entity\Owner")]
    #[ORM\JoinColumn(nullable: false)]
    private $owner;

    // Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getSpecies(): ?string
    {
        return $this->species;
    }

    public function setSpecies(string $species): self
    {
        $this->species = $species;
        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): self
    {
        $this->race = $race;
        return $this;
    }

    public function getColour(): ?string
    {
        return $this->colour;
    }

    public function setColour(string $colour): self
    {
        $this->colour = $colour;
        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    public function getSterilize(): ?bool
    {
        return $this->sterilize;
    }

    public function setSterilize(bool $sterilize): self
    {
        $this->sterilize = $sterilize;
        return $this;
    }

    public function getTattooNumber(): ?int
    {
        return $this->tattooNumber;
    }

    public function setTattooNumber(?int $tattooNumber): self
    {
        $this->tattooNumber = $tattooNumber;
        return $this;
    }

    public function getChipNumber(): ?int
    {
        return $this->chipNumber;
    }

    public function setChipNumber(?int $chipNumber): self
    {
        $this->chipNumber = $chipNumber;
        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;
        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    //Connect the animal to the owner entity
    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    public function setOwner(?Owner $owner): self
    {
        $this->owner = $owner;
        return $this;
    }

    public function isSterilize(): ?bool
    {
        return $this->sterilize;
    }
}

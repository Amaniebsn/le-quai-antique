<?php

namespace App\Entity;

use App\Repository\ReservationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationsRepository::class)]
class Reservations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;


    #[ORM\Column]
    private ?int $couverts = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTime $dates = null;

    

    #[ORM\Column(type: Types::TEXT)]
    private ?string $allergies = null;

    private ?string $horaire = null;
    


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): string 
    {
        return $this->getFirstname().' '.$this->getLastname();
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCouverts(): ?int
    {
        return $this->couverts;
    }

    public function setCouverts(int $couverts): self
    {
        $this->couverts = $couverts;

        return $this;
    }

    public function getDates(): ?\DateTimeInterface
    {
        return $this->dates;
    }

    public function getHoraire(): ?string
    {
        return $this->horaire;
    }

    public function setHoraire(string $horaire): self
    {
        $this->horaire = $horaire;

        return $this;
    }


    public function setDates(\DateTimeInterface $dates): self
    {
        $this->dates = $dates;

        return $this;
    }



    public function getAllergies(): ?string
    {
        return $this->allergies;
    }

    public function setAllergies(string $allergies): self
    {
        $this->allergies = $allergies;

        return $this;
    }
    
    

}

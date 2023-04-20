<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $jours = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJours(): ?string
    {
        return $this->jours;
    }

    public function setJours(string $jours): self
    {
        $this->jours = $jours;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CarRepository;


#[ORM\Entity(repositoryClass: CarRepository::class)]

class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbSeats = null;

    #[ORM\Column]
    private ?int $nbDoors = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 20, scale: 2)]
    private ?string $cost = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    private ?CarCategory $CarCategory = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbSeats(): ?int
    {
        return $this->nbSeats;
    }

    public function setNbSeats(int $nbSeats): self
    {
        $this->nbSeats = $nbSeats;

        return $this;
    }

    public function getNbDoors(): ?int
    {
        return $this->nbDoors;
    }

    public function setNbDoors(int $nbDoors): self
    {
        $this->nbDoors = $nbDoors;

        return $this;
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

    public function getCost(): ?string
    {
        return $this->cost;
    }

    public function setCost(string $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function __toString()
    {
        return $this->id;
    }

    public function getCarCategory(): ?CarCategory
    {
        return $this->CarCategory;
    }

    public function setCarCategory(?CarCategory $CarCategory): self
    {
        $this->CarCategory = $CarCategory;

        return $this;
    }
    

    
}

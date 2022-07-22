<?php

namespace App\Entity;

use App\Repository\CircleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CircleRepository::class)]
class Circle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    //private ?int $id = null;

    #[ORM\Column]
    private ?string $type = "Circle";

    #[ORM\Column]
    private ?float $radius = null;

    #[ORM\Column]
    private ?float $circumference = null;

    #[ORM\Column]
    private ?float $surface = null;


    /*public function getId(): ?int
    {
        return $this->id;
    }*/

    public function getRadius(): ?float
    {
        return $this->radius;
    }

    public function setRadius(float $radius): self
    {
        $this->radius = $radius;

        return $this;
    }


    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }


    public function getCircumference(): ?float
    {
        return $this->circumference;
    }

    public function setCircumference(): self
    {
        $this->circumference = number_format(($this->radius * pi() * 2), 2, ".", "");;

        return $this;
    }


    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(): self
    {
        $this->surface = number_format(($this->radius * $this->radius * pi()), 2, ".", "");

        return $this;
    }
}

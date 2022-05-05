<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestRepository::class)]
class Test
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 4)]
    private $lo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLo(): ?string
    {
        return $this->lo;
    }

    public function setLo(string $lo): self
    {
        $this->lo = $lo;

        return $this;
    }
}

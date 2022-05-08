<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 60)]
    private $designation;

    #[ORM\OneToMany(mappedBy: 'entreprise', targetEntity: PFE::class)]
    private $pfe;

    public function __construct()
    {
        $this->pfe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }
    public function __toString()
    {
        return $this->designation;
    }

    /**
     * @return Collection<int, PFE>
     */
    public function getPfe(): Collection
    {
        return $this->pfe;
    }

    public function addPfe(PFE $pfe): self
    {
        if (!$this->pfe->contains($pfe)) {
            $this->pfe[] = $pfe;
            $pfe->setEntreprise($this);
        }

        return $this;
    }

    public function removePfe(PFE $pfe): self
    {
        if ($this->pfe->removeElement($pfe)) {
            // set the owning side to null (unless already changed)
            if ($pfe->getEntreprise() === $this) {
                $pfe->setEntreprise(null);
            }
        }

        return $this;
    }
}

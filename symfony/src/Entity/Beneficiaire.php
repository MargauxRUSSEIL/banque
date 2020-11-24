<?php

namespace App\Entity;

use App\Repository\BeneficiaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BeneficiaireRepository::class)
 */
class Beneficiaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=CompteBancaire::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteBancaire;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="beneficiaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompteBancaire(): ?CompteBancaire
    {
        return $this->compteBancaire;
    }

    public function setCompteBancaire(?CompteBancaire $compteBancaire): self
    {
        $this->compteBancaire = $compteBancaire;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}

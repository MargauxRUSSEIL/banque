<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\Column(type="date")
     */
    private $doneAt;

    /**
     * @ORM\ManyToOne(targetEntity=CompteBancaire::class, inversedBy="credits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteCredite;

    /**
     * @ORM\ManyToOne(targetEntity=CompteBancaire::class, inversedBy="debits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteDebite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDoneAt(): ?\DateTimeInterface
    {
        return $this->doneAt;
    }

    public function setDoneAt(\DateTimeInterface $doneAt): self
    {
        $this->doneAt = $doneAt;

        return $this;
    }

    public function getCompteCredite(): ?CompteBancaire
    {
        return $this->compteCredite;
    }

    public function setCompteCredite(?CompteBancaire $compteCredite): self
    {
        $this->compteCredite = $compteCredite;

        return $this;
    }

    public function getCompteDebite(): ?CompteBancaire
    {
        return $this->compteDebite;
    }

    public function setCompteDebite(?CompteBancaire $compteDebite): self
    {
        $this->compteDebite = $compteDebite;

        return $this;
    }
}

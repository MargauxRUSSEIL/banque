<?php

namespace App\Entity;

use App\Repository\CompteBancaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteBancaireRepository::class)
 */
class CompteBancaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $iban;

    /**
     * @ORM\Column(type="float")
     */
    private $solde;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="compteBancaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Transaction::class, mappedBy="compteCredite")
     */
    private $credits;

    /**
     * @ORM\OneToMany(targetEntity=Transaction::class, mappedBy="compteDebite")
     */
    private $debits;

    public function __construct()
    {
        $this->credits = new ArrayCollection();
        $this->debits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): self
    {
        $this->solde = $solde;

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

    /**
     * @return Collection|Transaction[]
     */
    public function getCredits(): Collection
    {
        return $this->credits;
    }

    public function addCredit(Transaction $credit): self
    {
        if (!$this->credits->contains($credit)) {
            $this->credits[] = $credit;
            $credit->setCompteCredite($this);
        }

        return $this;
    }

    public function removeCredit(Transaction $credit): self
    {
        if ($this->credits->removeElement($credit)) {
            // set the owning side to null (unless already changed)
            if ($credit->getCompteCredite() === $this) {
                $credit->setCompteCredite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getDebits(): Collection
    {
        return $this->debits;
    }

    public function addDebit(Transaction $debit): self
    {
        if (!$this->debits->contains($debit)) {
            $this->debits[] = $debit;
            $debit->setCompteDebite($this);
        }

        return $this;
    }

    public function removeDebit(Transaction $debit): self
    {
        if ($this->debits->removeElement($debit)) {
            // set the owning side to null (unless already changed)
            if ($debit->getCompteDebite() === $this) {
                $debit->setCompteDebite(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\BatimentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BatimentRepository::class)
 */
class Batiment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * Transform to string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getId();
    }


    public function __toInt()
    {
        return (int) $this->getId();
    }
    private $numBatiment;

    /**
     * @ORM\OneToMany(targetEntity=Chambre::class, mappedBy="Batiment")
     */
    private $chambres;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function __construct()
    {
        $this->chambres = new ArrayCollection();
        $this->date= new \Datetime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumBatiment(): ?int
    {
        return $this->numBatiment;
    }

    public function setNumBatiment(int $numBatiment): self
    {
        $this->numBatiment = $numBatiment;

        return $this;
    }

    /**
     * @return Collection|Chambre[]
     */
    public function getChambres(): Collection
    {
        return $this->chambres;
    }

    public function addChambre(Chambre $chambre): self
    {
        if (!$this->chambres->contains($chambre)) {
            $this->chambres[] = $chambre;
            $chambre->setBatiment($this);
        }

        return $this;
    }

    public function removeChambre(Chambre $chambre): self
    {
        if ($this->chambres->contains($chambre)) {
            $this->chambres->removeElement($chambre);
            // set the owning side to null (unless already changed)
            if ($chambre->getBatiment() === $this) {
                $chambre->setBatiment(null);
            }
        }

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\BatimentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
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

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Ce champs ne doit pas être vide.")
     */
    private $numBatiment;



    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=Chambre::class, mappedBy="batiment")
     */
    private $chambres;

    public function __construct()
    {

        $this->date= new \Datetime();
        $this->chambres = new ArrayCollection();
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



    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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
}

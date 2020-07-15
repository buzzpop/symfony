<?php

namespace App\Entity;

use App\Repository\ChambreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ChambreRepository::class)
 */
class Chambre
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
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champs ne doit pas être vide.")
     */
    private $numChambre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez choisir le type de chambre.")
     */
    private $type;




    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=Etudiant::class, mappedBy="chambre")
     */
    private $etudiants;

    /**
     * @ORM\ManyToOne(targetEntity=Batiment::class, inversedBy="chambres")
     */

    private $batiment;


    public function __construct(){
        $this->date= new \Datetime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumChambre(): ?string
    {
        return $this->numChambre;
    }

    public function setNumChambre(string $numChambre): self
    {
        $this->numChambre = $numChambre;

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





    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getBatiment(): ?Batiment
    {
        return $this->batiment;
    }

    public function setBatiment(?Batiment $batiment): self
    {
        $this->batiment = $batiment;

        return $this;
    }

   


}

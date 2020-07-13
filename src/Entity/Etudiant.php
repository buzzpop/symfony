<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champs ne doit pas être vide.")
     */


    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     * )
     * @Assert\NotBlank(message="Ce champs ne doit pas être vide.")
     */


    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     * )
     * @Assert\NotBlank(message="Ce champs ne doit pas être vide.")
     */


    private $nom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaiss;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     * @Assert\NotBlank(message="Le champs Email ne doit pas être vide.")
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     *  @Assert\NotBlank(message="Le champs Tel ne doit pas être vide.")
     * @Assert\Regex("/^[7][0|7|8|6]([0-9]{7})$/", message="Entrez un numero de Telephone valide")
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez choisir le type d'Etudiant.")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="etudiants")
     * @Assert\NotBlank(message="Veuillez choisir le département.")
     */
    private $departement;

    /**
     * @ORM\ManyToOne(targetEntity=Chambre::class, inversedBy="etudiants")
     */
    private $chambre;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->dateNaiss;
    }

    public function setDateNaiss(\DateTimeInterface $dateNaiss): self
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

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

    public function getDepartement(): ?departement
    {
        return $this->departement;
    }

    public function setDepartement(?departement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getChambre(): ?chambre
    {
        return $this->chambre;
    }

    public function setChambre(?chambre $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }


}

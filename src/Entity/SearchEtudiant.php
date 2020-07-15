<?php
namespace App\Entity;
class SearchEtudiant {

    /**
     * @var string|null
     */
    private $matricule;

    /**
     * @return string|null
     */
    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    /**
     * @param string|null $matricule
     * @return SearchEtudiant
     */
    public function setMatricule(?string $matricule): SearchEtudiant
    {
        $this->matricule = $matricule;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return SearchEtudiant
     */
    public function setType(?string $type): SearchEtudiant
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    /**
     * @param string|null $departement
     * @return SearchEtudiant
     */
    public function setDepartement(?string $departement): SearchEtudiant
    {
        $this->departement = $departement;
        return $this;
    }

    /**
    * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $departement;
}

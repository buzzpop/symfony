<?php
namespace App\Entity;
class SearchChambre {

    /**
     * @var string|null
     */
    private $numchambre;


    /**
    * @var string|null
     */
    private $type;

    /**
     * @return string|null
     */
    public function getNumchambre(): ?string
    {
        return $this->numchambre;
    }

    /**
     * @param string|null $numchambre
     * @return SearchChambre
     */
    public function setNumchambre(?string $numchambre): SearchChambre
    {
        $this->numchambre = $numchambre;
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
     * @return SearchChambre
     */
    public function setType(?string $type): SearchChambre
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getBatiment(): ?int
    {
        return $this->batiment;
    }

    /**
     * @param int|null $batiment
     * @return SearchChambre
     */
    public function setBatiment(?int $batiment): SearchChambre
    {
        $this->batiment = $batiment;
        return $this;
    }

    /**
     * @var int|null
     */
    private $batiment;



}

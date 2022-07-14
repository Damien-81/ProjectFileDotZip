<?php
class vehicule
{
     /** Attribut */
    private string $nomVehicule;
    private string $proprietaire;
    private bool $solaire;
    private int $puissanceCrete;
    private string $referenceMoteur;
    private int $capaciteBt;
    private string $technologieBt;
    private string $description;

    /**
     * @param string $nomVehicule
     * @param string $proprietaire
     * @param bool $solaire
     * @param int $puissanceCrete
     * @param string $referenceMoteur
     * @param int $capaciteBt
     * @param string $technologieBt
     * @param string $description
     * @return void
     * 
     */
    public function __construct(string $nomVehicule, string $proprietaire, bool $solaire, int $puissanceCrete, string $referenceMoteur, 
    int $capaciteBt, string $technologieBt, string $description)
    {
        $this->nomVehicule = $nomVehicule;
        $this->proprietaire = $proprietaire;
        $this->solaire = $solaire;
        $this->puissanceCrete = $puissanceCrete;
        $this->referenceMoteur = $referenceMoteur;
        $this->capaciteBt = $capaciteBt;
        $this->technologieBt = $technologieBt;
        $this->description = $description;
    }
    
    /**
     * Get the value of nomVehicule
     * @return string
     */ 
    public function getNomVehicule()
    {
        return $this->nomVehicule;
    }

    /**
     * Get the value of proprietaire
     * @return string
     */ 
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * Get the value of solaire
     * @return bool
     */ 
    public function getSolaire()
    {
        return $this->solaire;
    }

    /**
     * Get the value of puissanceCrete
     * @return int
     */ 
    public function getPuissanceCrete()
    {
        return $this->puissanceCrete;
    }

    /**
     * Get the value of referenceMoteur
     * @return string
     */ 
    public function getReferenceMoteur()
    {
        return $this->referenceMoteur;
    }

    /**
     * Get the value of capaciteBt
     * @return int
     */ 
    public function getCapaciteBt()
    {
        return $this->capaciteBt;
    }

    /**
     * Get the value of technologieBt
     * @return string
     */ 
    public function getTechnologieBt()
    {
        return $this->technologieBt;
    }

    /**
     * Get the value of description
     * @return string
     */ 
    public function getDescription()
    {
        return $this->description;
    }
}
?>
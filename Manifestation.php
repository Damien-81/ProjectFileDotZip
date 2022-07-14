<?php
class Manifestation{

    /** Attribut */
	private string $nomManifestation;
	private int $annee;
    private float $longitudeMax;
    private float $latitudeMax;
    private float $longitudeMin;
    private float $latitudeMin;
    private string $siteWeb;
    private string $description;

    /**
     * @param string $nomManifestation
     * @param int $annee
     * @param float $longitudeMax
     * @param float $latitudeMax
     * @param float $longitudeMin
     * @param string $siteWeb
     * @param string $description
     * @return void
     * 
     */

    public function __construct(string $nomManifestation, int $annee, float $longitudeMax, float $latitudeMax, float $longitudeMin, float $latitudeMin,
    string $siteWeb, string $description)
    {
        $this->nomManifestation = $nomManifestation;
        $this->annee = $annee;
        $this->longitudeMax = $longitudeMax;
        $this->longitudeMin = $longitudeMin;
        $this->latitudeMax = $latitudeMax;
        $this->latitudeMin = $latitudeMin;
        $this->siteWeb = $siteWeb;
        $this->description = $description;

    }

    

	/**
	 * Get the value of nomManifestation
     * @return string
	 */ 
	public function getNomManifestation()
	{
		return $this->nomManifestation;
	}

	/**
	 * Get the value of annee
     * @return int
	 */ 
	public function getAnnee()
	{
		return $this->annee;
	}

    /**
     * Get the value of longitudeMax
     * @return float
     */ 
    public function getLongitudeMax()
    {
        return $this->longitudeMax;
    }

    /**
     * Get the value of latitudeMax
     * @return float
     */ 
    public function getLatitudeMax()
    {
        return $this->latitudeMax;
    }

    /**
     * Get the value of longitudeMin
     * @return float
     */ 
    public function getLongitudeMin()
    {
        return $this->longitudeMin;
    }

    /**
     * Get the value of latitudeMin
     * @return float
     */ 
    public function getLatitudeMin()
    {
        return $this->latitudeMin;
    }

    /**
     * Get the value of siteWeb
     * @return string
     */ 
    public function getSiteWeb()
    {
        return $this->siteWeb;
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
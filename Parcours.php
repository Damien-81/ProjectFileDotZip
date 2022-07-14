<?php

class Parcours
{
     /** Attribut */
    private string $nomParcours;
    private Manifestation $manifestation;

    /**
     * @param string $nomParcours
     * @param Manifestation $manifestation
     * */
    public function __construct(string $nomParcours, Manifestation $manifestation)
    {
        $this->nomParcours = $nomParcours;
        $this->manifestation = $manifestation;
    }

    /**
     * Get the value of nomParcours
     * @return string
     */ 
    public function getNomParcours()
    {
        return $this->nomParcours;
    }

    /**
     * Get the value of manifestation
     * @return string
     */ 
    public function getManifestation()
    {
        return $this->manifestation;
    }
}
?> 
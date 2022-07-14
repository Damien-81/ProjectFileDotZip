<?php

/**
 * Fichier : Function.php
 * Description : Fichier qui contient des fonctions utilisée pour le site web
 * Auteur : Teyssedre Matteo
 * Création : 8 mars 2021.
 * Dernière MàJ : 29 mars 2021, par Teyssedre Matteo.
 */

require ('ConnexionClass.php');
require ('Connexion.php');

if(isset($_POST['action']) && !empty($_POST['action'])) 
{
    $action = $_POST['action'];
    switch($action) 
    {
        case 'Vehicule' : Vehicule(); break;
        case 'Manifestation' : Manifestation(); break;
        case 'kilometer' : kilometer(); break;
        case 'map' : map(); break;
        case 'posVehicule' : posVehicule(); break;
        case 'EnCours' : EnCours(); break;

    }
}


// Fonction qui permet de récupérer les véhicules d'une manifestation 

function Vehicule()
{

    $bdd = connexion();
    $bdd2 = connexion();
    if ( isset($_POST['Manifestation'])){
    $manifestation = $_POST['Manifestation']; 
    $sql1 = "SELECT `DateHeure` FROM `enregistrement` ORDER BY `DateHeure` DESC LIMIT 1";
    $reponse1 = $bdd2->query($sql1);

    foreach ($reponse1 as $row1)
    {
        $date = $row1['DateHeure'];
    }

    $sql2 = "SELECT DISTINCT `NomVehicule` FROM `enregistrement` WHERE `Manifestation` = '$manifestation' AND `DateHeure` = '$date'"; // Requete sql
    $reponse2 = $bdd->query($sql2); // Utilisation de la méthode question sur l'objet bdd
 
        foreach ($reponse2 as $row2)
        {
            echo $row2['NomVehicule']."/";
        }
    }
}

// Fonction qui permet de récupérer les manifestations 
function Manifestation()
{

    $bdd = connexion();
    if ( isset($_POST['dateEnvoyer'])){
    $sql = $_POST['dateEnvoyer'];
    $reponse = $bdd->query("SELECT DISTINCT `Manifestation` FROM `enregistrement` WHERE `DateHeure` = '$sql'");
    
        foreach ($reponse as $row){
            echo $row['Manifestation']."/";
        }
    }
    
}

// Fonction qui récupérer la vitesse d'un véhicule
function kilometer()
{

    $bdd = connexion();
    if ( isset($_POST['Vehicule']) && isset($_POST['Manifestation'])){
    $manifestation = $_POST['Manifestation'];
    $vehicule = $_POST['Vehicule'];
    $sql = "SELECT `Vitesse` FROM `enregistrement` WHERE `Manifestation` = '$manifestation' AND `NomVehicule`= '$vehicule' ORDER BY `DateHeure` DESC LIMIT 1";
    $reponse = $bdd->query($sql);
    
        foreach ($reponse as $row)
        {   
            $vitesse = $row['Vitesse'];
        }
    }
    echo $vitesse;    

}

// Fontion qui permet de récupérer les coordonnée gps d'une manifestation
function map()
{
        $bdd = connexion();
        $manif = $_POST['Manif'];
        $sql = "SELECT `LongitudeMax`, `LatitudeMax`, `LongitudeMin`, `LatitudeMin` FROM `manifestation` WHERE `NomManifestation` = '$manif' ";
        $reponse = $bdd->query($sql);

        foreach ($reponse as $row)
        {
	        echo $row['LatitudeMax']."/";
	        echo $row['LatitudeMin']."/";
            echo $row['LongitudeMax']."/";
            echo $row['LongitudeMin']."/";
        }
}

// Fonction qui permet de récupérer les coordonnées d'un véhicule.
function posVehicule()
{        
        $bdd = connexion();
        $vehicule = $_POST['Vehicule'];
        $sql = "SELECT `Longitude`, `Latitude` FROM `enregistrement` WHERE `NomVehicule` = '$vehicule'";
        $reponse = $bdd->query($sql);

        foreach ($reponse as $row)
        {    
    	    echo $row['Latitude']."/";
		    echo $row['Longitude']."/";
        }    
}

// Fonction qui permet de savoir si une où des manifestations sont en cours.
function EnCours()
{

    $timezone  = 2;
    $dateActuelle = new DateTime( gmdate("Y-m-d H:i:s", time() + 3600*( $timezone+date("I") ) ) );

    $bdd = connexion();
    $sql = "SELECT `DateHeure` FROM `enregistrement` ORDER BY `DateHeure` DESC LIMIT 1";
    $reponse = $bdd->query($sql);
    
        foreach ($reponse as $row)
        {  
    	    $date = $row['DateHeure'];

        }

    $dateReponse = new DateTime($date);

    $dateDiff = $dateReponse->diff($dateActuelle);

    $dateInterval = new DateInterval('P0Y0DT0H3M');

    $moisDiff = $dateDiff->format('%R%m');
    $heureDiff = $dateDiff->format('%R%h');
    $jourDiff = $dateDiff->format('%R%d');
    $anneeDiff = $dateDiff->format('%R%y');
    $minuteDiff = $dateDiff->format('%R%i');

    if ( $anneeDiff == 0 && $moisDiff == 0 && $jourDiff == 0 && $heureDiff == 0 && $minuteDiff < 10)
    {
        echo "true"."/".$date;
    }
}

?>
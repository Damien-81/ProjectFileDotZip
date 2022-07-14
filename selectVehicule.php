<?php

require ('Connexion.php');

$bdd = connexion();

if( isset($_POST['Annee']) && isset($_POST['Manifestation']) )
{
    $Annee = $_POST['Annee'];
    $Manifestation = $_POST['Manifestation'];

    $reponse = $bdd->query("SELECT DISTINCT `NomVehicule` FROM `enregistrement` WHERE YEAR (`DateHeure`) = '$Annee' AND `Manifestation` = '$Manifestation' ")->fetchall();

    foreach ($reponse as $row)
    {
        echo $row['NomVehicule']."/";
    }
}
else
{
    echo "rien";
}
?>
<?php
require ('Connexion.php');

if( isset($_POST['vehiculeSelect']) && isset($_POST['manifSelect']))
{
    $vehiculeSelect = $_POST['vehiculeSelect'];
    $manifSelect = $_POST['manifSelect'];

    $data = "SELECT `NomVehicule`, `Signal controleur`, `Puissance humaine`, `Vitesse`, `Couple pedalier`, `Drapeaux` FROM `enregistrement` WHERE `Manifestation` = '$manifSelect' AND `NomVehicule` = '$vehiculeSelect' ORDER BY 'DateHeure' desc LIMIT 1";    
    $bdd = connexion();
    $reponse = $bdd->query($data)->fetchall();

    foreach($reponse as $row)
    {
        echo $row['NomVehicule']."/";
        echo $row['Signal controleur']."/";
        echo $row['Puissance humaine']."/";
        echo $row['Vitesse']."/";
        echo $row['Couple pedalier']."/";
        echo $row['Drapeaux'];
    }
}
?>
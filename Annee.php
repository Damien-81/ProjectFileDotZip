<?php

require ('Connexion.php');

$bdd = connexion();

if( isset($_POST['data']) )
{
    $Manif = $_POST['data'];
    $reponse = $bdd->query("SELECT `Annee` FROM `manifestation` WHERE `NomManifestation` = '$Manif' ")->fetchall();

    foreach ($reponse as $row)
    {
    echo $row['Annee']."/";
    }
}
else
{
    echo "rien";
}
?>
<?php

require ('Connexion.php');

$bdd = connexion();

$reponse = $bdd->query("SELECT DISTINCT `NomManifestation` FROM `manifestation` ")->fetchall();

foreach ($reponse as $row)
{
   echo $row['NomManifestation']."/";
}

?>
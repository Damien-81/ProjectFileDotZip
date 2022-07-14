<?php

require ('Connexion.php');

$timezone  = 1;
$dateActuelle = new DateTime( gmdate("Y-m-d H:i:s", time() + 3600*( $timezone+date("I") ) ) );

$bdd = connexion(); 
    $reponse = $bdd->query("SELECT `DateHeure` FROM `enregistrement` ORDER BY `DateHeure` DESC LIMIT 1");

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
       /* $manif = $bdd->query("SELECT DISTINCT `Manifestation` FROM `enregistrement` WHERE `DateHeure` = '$date'");
        foreach ($manif as $row){  
            $manif = $row['Manifestation']."/";
            echo $manif;
        }
        */
        echo "true"."/".$date;
    }
?>
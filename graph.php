<?php
require ('Connexion.php');
$bdd = connexion();

//$vitesse = $row['`Vitesse`']."/";         
/*$distance = $row['`Distance parcourue`']."/";
$temperature = $row['`Temperature`']."/";
$cadance = $row['`Cadence`']."/";
$puissance = $row['`Puissance humaine`']."/";
$couple = $row['`Couple pedalier`']."/";
$freinage = $row['`Freinage`']."/";*/

if( isset($_POST['Annee']) && isset($_POST['Manifestation']) && isset($_POST['NomVehicule']) )
{
   $Annee = $_POST['Annee'];
   $Manif = $_POST['Manifestation'];
   $Vehicule = $_POST['NomVehicule'];

   $reponse = $bdd->query("SELECT `Vitesse`,`Distance parcourue`,`Temperature`,`Cadence`,`Puissance humaine`,`Couple pedalier`,`Freinage` FROM `enregistrement` WHERE YEAR (`DateHeure`) = '$Annee' AND `Manifestation` = '$Manif' AND `NomVehicule` = '$Vehicule'")->fetchall();

      //$result=$ligne->fetch(PDO::FETCH_NUM)){
      //$conn->query($query)->fetch(PDO::FETCH_ASSOC);
      foreach ($reponse as $row)
      {
         echo $row["Vitesse"]."/";
      }
      echo "]";

      foreach ($reponse as $row)
      {
         echo $row['Distance parcourue']."/";
      }
      echo "]";

      foreach ($reponse as $row)
      {
         echo $row['Temperature']."/";
      }
      echo "]";

      foreach ($reponse as $row)
      {
         echo $row['Cadence']."/";
      }
      echo "]";

      foreach ($reponse as $row)
      {
         echo $row['Puissance humaine']."/";
      }
      echo "]";

      foreach ($reponse as $row)
      {
         echo $row['Couple pedalier']."/";
      }
      echo "]";

      foreach ($reponse as $row)
      {
         echo $row['Freinage']."/";
      }
      echo "]";
}
//print("vitesse : ".$reponse["Vitesse"] );
//echo "<br>";

?>
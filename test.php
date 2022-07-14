<?php
require ('Manifestation.php');
require ('Vehicule.php');
require ('Parcours.php');

$vehicule = New Vehicule('FiatMultiplat', 'Lilian', false, 120, 'B45B7FM', 800, 'ions', 'Voiture de lilian');

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=svs;charset=utf8mb4','root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch (PDOException $e)
{
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
}

$requete = $bdd->query("SELECT * FROM `manifestation`")->fetchAll();

$annee = intval($requete[0]->Annee);
$longitudeMax = floatval($requete[0]->LongitudeMax);
$latitudeMax = floatval($requete[0]->LatitudeMax);
$longitudeMin = floatval($requete[0]->LongitudeMin);
$latitudeMin = floatval($requete[0]->LatitudeMin);
$nomManifestation = $requete[0]->NomManifestation;
$siteWeb = $requete[0]->SiteWeb;
$description = $requete[0]->Descripton;

$manifestation = New Manifestation ($nomManifestation, $annee, $longitudeMax, $latitudeMax, $longitudeMin, $latitudeMin, $siteWeb, $description);
echo $manifestation->getNomManifestation();
echo "<br>";
echo $manifestation->getSiteWeb();
echo "<br>";

$parcours = New Parcours('Parcours1', $manifestation);

print_r($parcours->getManifestation()->getAnnee());
?>
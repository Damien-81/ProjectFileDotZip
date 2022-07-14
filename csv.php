<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);
 
$filename = "export_".date('Y-m-d_H-i').".csv";
    // Connexion a la bdd
    require ("Connexion.php");
    $bdd = connexion();


    if ( isset($_POST['choixAnnee']) && isset($_POST['choixManif']) && isset($_POST['choixVehicule'])){
        $Annee = $_POST['choixAnnee'];
        $Manifestation = $_POST['choixManif'];
        $Vehicule = $_POST['choixVehicule'];

    // Téléchargement du fichier
    $req = $bdd->query("SELECT * FROM `enregistrement` WHERE YEAR (`DateHeure`) = '$Annee' AND `Manifestation` = '$Manifestation' AND `NomVehicule` = '$Vehicule'");
//requete
$req->execute();
}
 
//creation du csv
$out = makeCSV($req);
 
 
function makeCSV($req){
    $csv_terminated = "\n";
    $csv_separator = ",";
    $csv_enclosed = '';
    $csv_escaped = "\\";
 
    //recupération nom de colonne
    foreach(range(0, $req->columnCount() - 1) as $column_index){
        $nameCol[] = $req->getColumnMeta($column_index)['name'];
    }
 
    //création ligne d'en tete
    array_walk($nameCol, 'format', $csv_enclosed);
    $out = implode(',', $nameCol).$csv_terminated;
 
    //création ligne d'enregistrement
    while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
        array_walk($row, 'format', $csv_enclosed);
        $out .= implode(',', $row).$csv_terminated;   
    }
    return $out;
}
 
//fonction de formatage des cellules
function format(&$item,$key, $escaped){
    $item = $escaped.addcslashes($item,$escaped).$escaped;
}

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($out));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=$filename");
echo $out;
exit;

?>
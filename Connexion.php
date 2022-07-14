<?php

function connexion()
{
	$login = "root";
	$pass = "";

	try
	{
	    $bdd = new PDO('mysql:host=localhost;port=3306;dbname=svs;charset=utf8mb4', $login,  $pass);
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}
	catch (PDOException $e)
	{
		$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
		die($msg);
    }

	return $bdd;
		
}

?>
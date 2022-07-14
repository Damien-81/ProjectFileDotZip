<?php

/**
 * Fichier : ConnexionClass.php
 * Description : Class qui permet la connexion a une bdd ainsi que le traitement de requete.
 * Auteur : Teyssedre Matteo.
 * Création : 22 mars 2021.
 * Dernière MàJ : 29 mars 2021, par Teyssedre Matteo.
 */

class connexion
{
	/** Attribut */
	private $login;
	private $pass;
	private $connec;

	/**  Constructeur exemple d'appel : $bdd = New connexion('autocomplement'); */

	public function __construct($db = 'svs', $login ='root', $pass='')
	{
		$this->login = $login;
		$this->pass = $pass;
		$this->db = $db;
		$this->connexion();
	}

	/** Méthode appel par le constructeur elle permet de liee l'attribut connec a la bdd */
	protected function connexion()
	{
		try
		{
	        $bdd = new PDO(
                        'mysql:host=localhost;port=3306;dbname='.$this->db.';charset=utf8mb4', 
                        $this->login, 
                        $this->pass
            );
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			$this->connec = $bdd;
		}
		catch (PDOException $e)
		{
			$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
		}
	}
	
	/**
	 * Get the value of connec
	 */ 
	public function getConnec()
	{
		return $this->connec;
	}

	/**
	 * Get the value of login
	 */ 
	public function getLogin()
	{
		return $this->login;
	}

	/**
	 * Get the value of pass
	 */ 
	public function getPass()
	{
		return $this->pass;
	}
}

?>
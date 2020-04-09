<?php
class db{
	private $_host = 'mysql:host=localhost;port=3306;dbname=wayprotein;charset=utf8';
	private $_username = 'root';
	private $_password = '';
	private $_bdd;

	public function getBdd(){
	try
    {
        $bdd = new PDO(_host, _username, _password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }
    catch (Exception $e)
    {
        //die — Alias de la fonction exit qui affiche un message et termine le script courant
        die('Erreur : ' . $e->getMessage());
    }
	}	
}

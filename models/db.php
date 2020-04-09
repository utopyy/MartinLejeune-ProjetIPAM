<?php
	function getBdd(){
	try
    {
        $bdd = new PDO('mysql:host=localhost;port=3306;dbname=wayprotein;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }
    catch (Exception $e)
    {
        //die — Alias de la fonction exit qui affiche un message et termine le script courant
        die('Erreur : ' . $e->getMessage());
    }
	
}

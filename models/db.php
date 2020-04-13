<?php
define('HOST', "localhost");
define('PORT', "3306");
define('DBNAME',"wayprotein");
define('ROOTDB',"root");
define('PASSDB',"");
	function getBdd(){
	try
    {
		$bdd = new PDO('mysql:host='.HOST.';port='.PORT.';dbname='.DBNAME.';charset=utf8', ROOTDB, PASSDB, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }
    catch (Exception $e)
    {
        //die — Alias de la fonction exit qui affiche un message et termine le script courant
        die('Erreur : ' . $e->getMessage());
    }
}

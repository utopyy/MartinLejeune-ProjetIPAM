<?php
require_once '../models/db.php';

function getUserById($id) {
    $reponse = getBdd()->prepare('SELECT * FROM USER WHERE id = :id');
    $reponse->execute([':id' => $id]);
    $user = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $user;
}

function getUserByLogin($login) {
    $reponse = getBdd()->prepare('SELECT * FROM USER WHERE username = :login');
    $reponse->execute([':login' => $login]);
    $user = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $user;
}

function createUser($username, $firstname, $lastname, $birthdate, $mail, $password){
	$response = getBdd()->prepare('INSERT INTO user(username, firstname, lastname, birthdate, mail, password, role_id, adress_id, date_creation, last_connection) VALUES (:username, :firstname, :lastname, :birthdate, :mail, :password, :role_id, :adress_id, :date_creation, :last_connection)');
	$response->execute([':username' => $username, ':firstname' => $firstname, ':lastname' => $lastname, ':birthdate' => $birthdate, ':mail' => $mail, ':password' => password_hash($password, PASSWORD_DEFAULT), ':role_id' => '1', ':adress_id' => '1', ':date_creation' => $birthdate, ':last_connection' => $birthdate]);
	$response->closeCursor();
	header('Location: ../index.php');
	exit();
}
	
function setUser($id, $login, $email, $password) {
    $user = getUserById($id);
    //C'est ici qu'on va faire l'update de l'utilisateur.
    $reponse = getBdd()->prepare('UPDATE USER SET login = :login, email = :email, password = :password WHERE id = :id');
    if($password){
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
        $password = $user['password'];
    }
    $reponse->execute([':id' => $id, ':email' => $email, ':password' => $password, ':login' => $login]);
    $reponse->closeCursor(); // Termine le traitement de la requête
}

?>

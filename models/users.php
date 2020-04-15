<?php
require_once 'models/db.php';

function getUserById($id) {
    $reponse = getBdd()->prepare('SELECT * FROM USER WHERE id = :id');
    $reponse->execute([':id' => $id]);
    $user = $reponse->fetch();
    $reponse->closeCursor();
    return $user;
}

function getMailFromUser($mail){
	$response = getBdd()->prepare('SELECT * FROM USER WHERE mail = :mail');
	$response->execute([':mail' => $mail]);
	$mail = $response->fetch();
	$response->closeCursor();
	return $mail;
}

function getUserByLogin($login) {
    $reponse = getBdd()->prepare('SELECT * FROM USER WHERE username = :login');
    $reponse->execute([':login' => $login]);
    $user = $reponse->fetch();
    $reponse->closeCursor();
    return $user;
}

function createUser($username, $firstname, $lastname, $birthdate, $mail, $password, $country, $city, $zip, $street, $house_number){
	$response = getBdd()->prepare('INSERT INTO user(username, firstname, lastname, birthdate, mail, password, role_id, date_creation, last_connection) VALUES (:username, :firstname, :lastname, :birthdate, :mail, :password, :role_id, :date_creation, :last_connection)');
	$response->execute([':username' => $username, ':firstname' => $firstname, ':lastname' => $lastname, ':birthdate' => $birthdate, ':mail' => $mail, ':password' => password_hash($password, PASSWORD_DEFAULT), ':role_id' => '1', ':date_creation' => date('Y-m-d'), ':last_connection' => date('Y-m-d')]);
	createUserAdresse($country, $city, $zip, $street, $house_number, $username);
	$response->closeCursor();
}

function createUserAdresse($country, $city, $zip, $street, $house_number, $username){
		$response = getBdd()->prepare('INSERT INTO adress(country, city, zip, street, house_number, username) VALUES (:country, :city, :zip, :street, :house_number, :username)');
	$response->execute([':country' => $country, ':city' => $city, ':zip' => $zip, ':street' => $street, ':house_number' => $house_number, ':username' => $username]);
		$response->closeCursor();
}	
	
// a modifier lors de l'update USER
function setUser($id, $login, $email, $password) {
    $user = getUserById($id);
    $reponse = getBdd()->prepare('UPDATE USER SET login = :login, email = :email, password = :password WHERE id = :id');
    if($password){
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
        $password = $user['password'];
    }
    $reponse->execute([':id' => $id, ':email' => $email, ':password' => $password, ':login' => $login]);
    $reponse->closeCursor();
}

function getAllUsers(){
	$response = getBdd()->prepare('SELECT u.username, u.firstname, u.lastname, u.birthdate, a.street, a.house_number, a.zip, a.city, a.country, u.mail, u.role_id, u.date_creation, u.last_connection FROM `user` AS u, adress AS a WHERE u.username = a.username');
	$response->execute();
	$users = $response->fetchAll(PDO::FETCH_ASSOC);
	$response->closeCursor();
	return $users;
}

function deleteUser($username){
	//on supprime d'abord l'adresse (autre table)
	$response = getBdd()->prepare('DELETE FROM adress WHERE username = :username');
	$array = array('username' => $username);
	$response->execute($array);
	//puis le user
	$response = getBdd()->prepare('DELETE FROM `user` WHERE username = :username');
	$response->execute($array);
	$response->closeCursor();
	header("Location: edit_users");
}
?>

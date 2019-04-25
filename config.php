<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 022 22.04.19
 * Time: 22:00
 */

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "login";
try {
	//create PDO connection
	$pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
	// Set the PDO error mode to exception
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $erкor) {
	//show error
	die("Возникла проблема подключения к БД" . $erкor->getMessage());
}
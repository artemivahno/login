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
	$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
}
catch(PDOException $erкor) {
	//show error
	die("Возникла проблема " . $erкor->getMessage());
}
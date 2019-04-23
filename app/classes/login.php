<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 023 23.04.19
 * Time: 7:12
 */
if(!empty($_POST['password']) and !empty($_POST['login'])) {
	$login = $_POST['login'];
	$password = $_POST['password'];

	$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
	$result = mysqli_query($link, $query);

	$user = mysqli_fetch_assoc($result);

	if(!empty($user)){
		// Пользователь прошел авторизацию
		$_SESSION['auth'] = true;
	} else {
		// Пользователь неверно ввел логин или пароль
	}
}
<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 023 23.04.19
 * Time: 7:12
 */
include("$_SERVER[DOCUMENT_ROOT]/config.php");

if(isset($_POST['login'])){
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";

    $statement = $db->prepare($sql);

    // запрос параметров
    $params = array(
        ":username" => $username,
        ":email" => $username
    );
    $statement->execute($params);
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    // Если user зарегистрирован
    if($user){
        // проверка пароля
        if(password_verify($password, $user["password"])){

        	session_start();
            $_SESSION["user"] = $user;

            // Залогинились успешно
            header("Location: timeline.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Pesbuk</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index.php">Home</a>

        <h4>Авторизуйтесь</h4>
        <p>Еще не зарегистрированы? <a href="register.php">Регистрация</a></p>

        <form action="" method="POST">

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Введите логин / email" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Пароль" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="login" value="Войти" />

        </form>

        </div>

        <div class="col-md-6">
        </div>

    </div>
</div>

</body>
</html>
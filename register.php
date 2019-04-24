<?php

require_once("config.php");

if(isset($_POST['register'])){

    // фильтр входных данных
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // шифрование пароля
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // подготовка запроса
    $sql = "INSERT INTO users (name, username, email, password) 
            VALUES (:name, :username, :email, :password)";
    $statement = $db->prepare($sql);

    // параметры запроса
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // выполнение запроса для сохранения в базу данных
    $saved = $statement->execute($params);

    // если сохранение успшно переходим на страницу авторизации
    if($saved) header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Pesbuk</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index.php">Home</a>

        <h4>Введите свои данные для регистрации</h4>
        <p>Уже зарегистрированы? <a href="login.php">Войдите в систему</a></p>

        <form action="" method="POST">

            <div class="form-group">
                <label for="name">Имя</label>
                <input class="form-control" type="text" name="name" placeholder="Имя" />
            </div>

            <div class="form-group">
                <label for="username">Login</label>
                <input class="form-control" type="text" name="username" placeholder="Логин" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Email" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Пароль" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="register" value="Зарегистрироваться" />

        </form>
            
        </div>

        <div class="col-md-6">
            <img class="img img-responsive" src="img/connect.png" />
        </div>

    </div>
</div>

</body>
</html>
<?php

require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // фильтр входных данных
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

    // шифрование пароля
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // подготовка запроса
    $sql = "INSERT INTO users (username, email, password, description) 
            VALUES (:username, :email, :password, :description)";
    $stmt = $pdo->prepare($sql);

    // параметры запроса
    $params = array(
        ":username" => $username,
        ":password" => $password,
        ":email" => $email,
        ":description" => $description,
    );

    // выполнение запроса для сохранения в базу данных
    $saved = $stmt->execute($params);

    // если сохранение успшно переходим на страницу авторизации
    if ($saved) {
        header("Location: login.php");
    } else {
        echo " Что-то пошло не так, повторите попытку";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация пользователя</title>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>
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
                    <label for="username">Имя/Логин</label>
                    <input class="form-control" type="text" name="username" placeholder="Введите Имя/Логин" required/>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Введите Email" required/>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Пароль" required/>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg"
                               placeholder="Подтверждение пароля" tabindex="4">
                    </div>
                </div>

                <div class="form-group">
                    <lable for="photo">Image:</lable>
                    <input class="form-control-file" type="file" name="photo" id="profile-img"/>
                    <img src="" id="profile-img-tag" width="100px"/>

                </div>

                <div class="form-group">
                    <label for="descripion">О себе</label>
                    <input class="form-control" type="text" name="descripion" placeholder="Пару слов о себе"/>
                </div>

                <input type="submit" class="btn btn-success btn-block" name="register" value="Зарегистрироваться"/>

            </form>

        </div>

        <div class="col-md-6">
            <img class="img img-responsive" src="img/connect.png"/>
        </div>

    </div>
</div>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#profile-img").change(function () {
        readURL(this);
    });
</script>

</body>
</html>
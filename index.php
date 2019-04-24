<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesbuk</title>

     <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">
    <header>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1>Добро пожаловать в форму регистрации</h1>
                        <p>Присоединяйтесь</p>
                    </div>
                    <div class="col-md-4">
                        <a href="login.php" class="btn btn-secondary">Войти в систему</a>
                        <a href="register.php" class="btn btn-success">Зарегистрироваться</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img class="img img-responsive" src="img/connect.png" />
                    </div>
                </div>
            </div>
    </section>

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 022 22.04.19
 * Time: 21:39
 */
if(!empty($_SESSION['auth'])){

} else{
	echo "пожалуйста, авторизуйтесь";

}


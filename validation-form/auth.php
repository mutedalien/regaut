<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING); //  отбрасываем недопустимые символы и значения
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    $pass = md5($pass."poijklmn357qsxzse456");

    $mysql = new mysqli('localhost', 'root', '', 'regaut'); //  создаем коннект к базе

    //  ищем пользователя в базе
    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
    $user = $result->fetch_assoc();
    if (count($user) == 0) {
        echo "Такой пользователь не найден";
        exit();
    }
    //    проверка
    //    print_r($user);
    //    exit();

    $mysql -> close();  //  закрываем

    header('Location: /');  //  возвращаемся на главную
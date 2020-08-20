<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING); //  отбрасываем недопустимые символы и значения
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    if (mb_strlen($login) < 2 || mb_strlen($login) > 90) {      // проверка длинны
        echo "Ндопустимая длинна логина";
        exit();
    }   elseif (mb_strlen($name) < 2 || mb_strlen($name) > 50) {
        echo "Ндопустимая длинна имени";
        exit();
    }   elseif (mb_strlen($pass) < 2 || mb_strlen($pass) > 50) {
        echo "Ндопустимая длинна имени";
        exit();
    }

    $pass = md5($pass."poijklmn357qsxzse456");

    $mysql = new mysqli('localhost', 'root', '', 'regaut'); //  создаем коннект к базе
    $mysql -> query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES('$login', '$pass', '$name')");    //  вставляем значения

    $mysql -> close();  //  закрываем

    header('Location: /');  //  возвращаемся на главную
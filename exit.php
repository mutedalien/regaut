<?php
    setcookie('user', $user['name'], time() - 3600, "/");   //  трем куки
    header('Location: /');  //  возвращаемся на главную
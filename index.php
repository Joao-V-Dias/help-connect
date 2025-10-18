<?php

    $fun = $_GET["url"];

    switch ($fun) {
        case 'cadastrar':
            include 'visao/cadastrar.php';
            break;

        case 'login':
            include 'visao/login.php';
            break;

        case '':
        case 'home':
            include 'visao/home.php';
            break;

        default:
            http_response_code(404);
            include 'visao/404.php';
            break;
    }

?>
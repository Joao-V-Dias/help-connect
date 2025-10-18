<?php
// COLOQUE ISSO NO TOPO DO SEU ARQUIVO PRINCIPAL (ex: index.php)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
// ... resto do seu código ...


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
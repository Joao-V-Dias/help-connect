<?php
	session_start();
    $fun = $_GET["fun"];

    switch ($fun) {
        case 'cadastrar':
            include_once("controle/CadastrarUsuario_class.php");
			$pag = new CadastrarUsuario();
            break;

        case 'login':
            include 'controle/LoginUsuario_class.php';
            break;

        default:
            http_response_code(404);
            include 'visao/404.php';
            break;
    }

?>
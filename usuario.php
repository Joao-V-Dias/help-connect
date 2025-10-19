<?php
    session_start();
    $fun = $_GET["fun"];

    switch ($fun) {
        case 'cadastrar':
            include_once("controller/UsuarioController/add.php");
			$pag = new CadastrarUsuario();
            break;

        // case 'buscar':
        //     include_once("controle/BuscarUsuario_class.php");
        //     $pag = new BuscarUsuario();

        default:
            http_response_code(404);
            include 'visao/404.php';
            break;
    }

?>
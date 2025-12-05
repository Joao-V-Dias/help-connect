<?php
$phpPath = __DIR__ . '/model/Usuario_class.php';
if (file_exists($phpPath)) {
    require_once $phpPath;
}
session_start();
$fun = isset($_GET["fun"]) ? $_GET["fun"] : '';

switch ($fun) {
    case 'cadastrar':
        include_once("controller/UsuarioController/add.php");
        $pag = new CadastrarUsuario();
        break;

    case 'login':
        include_once("controller/UsuarioController/login.php");
        $pag = new LoginUsuario();
        break;

    case 'buscar':
        include_once("controller/UsuarioController/buscar.php");
        $pag = new BuscarUsuario();
        break;

    case 'editar':
        include_once("controller/UsuarioController/editar.php");
        $pag = new EditarUsuario();
        break;

    default:
        http_response_code(404);
        include 'view/erro.php';
        break;
}

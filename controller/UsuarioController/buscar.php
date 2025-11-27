<?php
require_once __DIR__ . '/../../model/UsuarioDAO_class.php';
require_once __DIR__ . '/../../model/Usuario_class.php';

class BuscarUsuario
{
    function __construct()
    {
        if (isset($_GET["id"])) {
            $id = intval($_GET["id"]);
            if ($id <= 0) {
                http_response_code(404);
                require_once __DIR__ . '/../../view/404.php';
                return;
            }

            $dao = new UsuarioDAO();
            $perfil = $dao->buscar($id);

            if (!$perfil) {
                http_response_code(404);
                require_once __DIR__ . '/../../view/404.php';
                return;
            }

            require_once __DIR__ . '/../../view/Usuario/buscar.php';
        } else {
            // missing id -> redirect to home
            header('Location: /help-connect/');
            exit;
        }
    }
}

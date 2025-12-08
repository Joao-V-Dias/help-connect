<?php
require_once ROOT_PATH . '/model/UsuarioModel/UsuarioDAO_class.php';
require_once ROOT_PATH . '/model/UsuarioModel/Usuario_class.php';

class BuscarUsuario
{
    function __construct()
    {
        if (isset($_GET["id"])) {
            $id = intval($_GET["id"]);
            if ($id <= 0) {
                http_response_code(404);
                require_once ROOT_PATH . '/view/erro.php';
                return;
            }

            $dao = new UsuarioDAO();
            $perfil = $dao->buscar($id);

            if (!$perfil) {
                http_response_code(404);
                require_once ROOT_PATH . '/view/erro.php';
                return;
            }

            require_once ROOT_PATH . '/view/UsuarioView/buscar.php';
        } else {
            header('Location: /help-connect/');
            exit;
        }
    }
}

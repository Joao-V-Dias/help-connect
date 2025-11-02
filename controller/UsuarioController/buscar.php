<?php
require_once "dao/UsuarioDAO_class.php";

class BuscarUsuario
{
    function __construct()
    {
        if(isset($_GET["id"])){
            $id = $_GET["id"];

            $dao = new UsuarioDAO();
            $perfil = $dao->buscar($id);

            require_once __DIR__ . '/../../view/Usuario/buscar.php';
        }
    }
}

<?php
require_once ROOT_PATH . "/model/UsuarioModel/UsuarioDAO_class.php";

class LoginUsuario
{
    function __construct()
    {
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            $dao = new UsuarioDAO();
            $usuario = $dao->login($email, $senha);

            if ($usuario) {
                $_SESSION['usuario'] = $usuario;
                header('Location: /help-connect/');
                exit;
            } else {
                $_SESSION['erro_login'] = "Email ou senha inválidos";
                header('Location: /help-connect/view/UsuarioView/login.php');
                exit;
            }
        }
    }
}

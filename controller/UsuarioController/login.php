<?php
require_once "dao/UsuarioDAO_class.php";

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
                $_SESSION['usuario_id'] = $usuario->getId();
                $_SESSION['usuario_nome'] = $usuario->getNome();
                $_SESSION['usuario_foto'] = $usuario->getFoto();
                header('Location: /help-connect/');
                exit;
            } else {
                $_SESSION['erro_login'] = "Email ou senha inválidos";
                header('Location: /help-connect/view/Usuario/login.php');
                exit;
            }
        }
    }
}

<?php
require_once "dao/UsuarioDAO_class.php";

class CadastrarUsuario
{
    function __construct()
    {
        if (isset($_POST["enviar"])) {

            $usuario = new Usuario();
            $usuario->setNome($_POST["nome"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setTelefone($_POST["telefone"]);
            $usuario->setCidade($_POST["cidade"]);
            $usuario->setSenha($_POST["senha"]);
            $usuario->setFoto('assets/img/usuarios/default.jpg');

            $dao = new UsuarioDAO();
            $id = $dao->create($usuario);

            $_SESSION['usuario_id'] = $id;
            $_SESSION['usuario_nome'] = $usuario->getNome();
            $_SESSION['usuario_foto'] = $usuario->getFoto();

            header('Location: /help-connect/');
            exit;
        }
    }
}

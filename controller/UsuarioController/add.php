<?php
require_once "dao/UsuarioDAO_class.php";

class CadastrarUsuario
{
    function __construct()
    {
        if (isset($_POST["enviar"])) {

            $c = new Usuario();
            $c->setNome($_POST["nome"]);
            $c->setEmail($_POST["email"]);
            $c->setTelefone($_POST["telefone"]);
            $c->setCidade($_POST["cidade"]);
            $c->setSenha($_POST["senha"]);
            $c->setFoto("https://wallpapers.com/images/high/alpaca-lowered-ears-izpzu2pf2lupt5ho.webp");

            $dao = new UsuarioDAO();
            $id = $dao->create($c);

            $_SESSION['usuario_id'] = $id;
            $_SESSION['usuario_nome'] = $c->getNome();
            $_SESSION['usuario_foto'] = $c->getFoto();

            header('Location: /help-connect/');
            exit;
        }
    }
}

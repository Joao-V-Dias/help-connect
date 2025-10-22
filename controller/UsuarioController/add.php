<?php
require_once "dao/UsuarioDAO_class.php";

class CadastrarUsuario
{
    function __construct()
    {
        if (isset($_POST["enviar"])) {

            $arquivo = $_FILES["foto"]["tmp_name"];
            $nome = $_FILES["foto"]["name"];

            $extensao = pathinfo($nome, PATHINFO_EXTENSION);
            $extensao = strtolower($extensao);

            if(in_array($extensao, ['jpg', 'jpeg', 'gif', 'png'])){
                $novoNome = uniqid(time()) . "." . $extensao;
                $foto = "assets/img/usuarios/" . $novoNome;

                if(move_uploaded_file($arquivo, __DIR__ . "/../../view/" . $foto)){
                    $status = "Upload feito com sucesso";
                }
            }else{
                $foto = "assets/img/usuarios/default.jpg";
            }

            $usuario = new Usuario();
            $usuario->setNome($_POST["nome"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setTelefone($_POST["telefone"]);
            $usuario->setCidade($_POST["cidade"]);
            $usuario->setSenha($_POST["senha"]);
            $usuario->setFoto($foto);

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

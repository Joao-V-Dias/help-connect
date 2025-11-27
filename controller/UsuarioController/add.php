<?php
require_once "model/UsuarioDAO_class.php";
require_once "model/Usuario_class.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class CadastrarUsuario
{
    function __construct()
    {
        if (isset($_POST["enviar"])) {
            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $telefone = trim($_POST['telefone'] ?? '');
            $cidade = trim($_POST['cidade'] ?? '');
            $senha = trim($_POST['senha'] ?? '');

            $foto = null;
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $foto = $this->processarUpload($_FILES['foto']);
                if (!$foto) {
                    $_SESSION['erro'] = 'Erro ao fazer upload da imagem';
                    header('Location: /help-connect/view/Usuario/cadastrar.php');
                    exit;
                }
            }

            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

            $usuario = new Usuario();
            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setTelefone($telefone);
            $usuario->setCidade($cidade);
            $usuario->setSenha($senha_hash);
            $usuario->setFoto($foto);

            $dao = new UsuarioDAO();
            $idNovoUsuario = $dao->create($usuario);

            if (!$idNovoUsuario) {
                $_SESSION['erro'] = 'Erro ao criar usuário. Tente novamente.';
                header('Location: /help-connect/view/Usuario/cadastrar.php');
                exit;
            }

            $usuario = $dao->buscar($idNovoUsuario);
            $_SESSION['usuario'] = $usuario;

            header('Location: /help-connect/');
            exit;
        }
    }

    private function processarUpload($file)
    {
        $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($file['type'], $tiposPermitidos)) {
            return false;
        }

        if ($file['size'] > 5 * 1024 * 1024) {
            return false;
        }

        $nomeArquivo = time() . uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        $diretorio = __DIR__ . '/../../view/assets/img/usuarios/';

        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0755, true);
        }

        if (move_uploaded_file($file['tmp_name'], $diretorio . $nomeArquivo)) {
            return 'assets/img/usuarios/' . $nomeArquivo;
        }

        return false;
    }
}

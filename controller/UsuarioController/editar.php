<?php
require_once __DIR__ . '/../../model/UsuarioModel/UsuarioDAO_class.php';
require_once __DIR__ . '/../../model/UsuarioModel/Usuario_class.php';

class EditarUsuario
{
    function __construct()
    {
        if (isset($_POST['editar'])) {
            session_start();
            $usuario = $_SESSION['usuario'] ?? null;

            if (!$usuario) {
                $_SESSION['erro'] = 'Usuário não encontrado na sessão';
                header('Location: /help-connect/view/Usuario/login.php');
                exit;
            }

            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $telefone = trim($_POST['telefone'] ?? '');
            $cidade = trim($_POST['cidade'] ?? '');
            $senha = trim($_POST['senha'] ?? '');

            if (empty($nome) || empty($email)) {
                $_SESSION['erro'] = 'Nome e e-mail são obrigatórios';
                header('Location: /help-connect/view/Usuario/editarUsuario.php');
                exit;
            }

            $fotoNova = null;
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $fotoNova = $this->processarUpload($_FILES['foto']);
                if (!$fotoNova) {
                    $_SESSION['erro'] = 'Erro ao fazer upload da imagem';
                    header('Location: /help-connect/view/Usuario/editarUsuario.php');
                    exit;
                }
            }

            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setTelefone($telefone);
            $usuario->setCidade($cidade);
            if ($fotoNova) {
                $usuario->setFoto($fotoNova);
            }
            if (!empty($senha)) {
                $usuario->setSenha(password_hash($senha, PASSWORD_BCRYPT));
            }

            $dao = new UsuarioDAO();
            $resultado = $dao->atualizar($usuario, !empty($senha));

            if ($resultado) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['sucesso'] = 'Perfil atualizado com sucesso!';
                header('Location: /help-connect');
                exit;
            } else {
                $_SESSION['erro'] = 'Erro ao atualizar perfil. Tente novamente.';
                header('Location: /help-connect/view/Usuario/editarUsuario.php');
                exit;
            }
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

<?php
// Carrega a classe antes da sessão para evitar incomplete object
require_once __DIR__ . '/../../model/Usuario_class.php';
if (session_status() === PHP_SESSION_NONE) session_start();

$usuario = $_SESSION['usuario'] ?? null;
if (!$usuario) {
    $_SESSION['erro_login'] = 'Faça login para continuar';
    header('Location: /help-connect/view/Usuario/login.php');
    exit;
}

$nome = htmlspecialchars($usuario->getNome());
$email = htmlspecialchars($usuario->getEmail());
$telefone = htmlspecialchars($usuario->getTelefone());
$cidade = htmlspecialchars($usuario->getCidade());
$foto = htmlspecialchars($usuario->getFoto());
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Perfil - HelpConnect</title>
    <link rel="stylesheet" href="../assets/css/config.css">
    <link rel="stylesheet" href="../assets/css/editarUsuario.css">
</head>

<body>
    <?php include_once __DIR__ . '/../assets/Header_Footer/Header.php'; ?>

    <main class="edit-container">
        <form class="edit-card" action="../../usuario.php?fun=editar" method="POST" enctype="multipart/form-data">
            <h2>Editar Perfil</h2>

            <div class="photo-section">
                <?php
                // Monta o path correto da foto
                $fotoDb = $usuario->getFoto();
                if ($fotoDb && strpos($fotoDb, 'assets/img/usuarios/') === 0) {
                    $fotoPath = '/help-connect/view/' . $fotoDb;
                } else if ($fotoDb) {
                    $fotoPath = '/help-connect/view/assets/img/usuarios/' . $fotoDb;
                } else {
                    $fotoPath = '/help-connect/view/assets/img/usuarios/default.jpg';
                }
                ?>
                <img id="previewFoto" src="<?php echo $fotoPath; ?>" alt="Foto do usuário" class="edit-photo">
                <label for="foto" class="upload-label">Alterar foto</label>
                <input type="file" id="foto" name="foto" accept="image/*" class="file-input">
            </div>

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" value="<?php echo $telefone; ?>">
            </div>

            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" name="cidade" value="<?php echo $cidade; ?>">
            </div>

            <div class="form-group">
                <label for="senha">Nova Senha (opcional)</label>
                <input type="password" id="senha" name="senha" placeholder="Deixe em branco para manter a senha atual">
            </div>

            <div class="actions">
                <button type="submit" name="editar" class="btn primary">Salvar alterações</button>
                <a href="../../index.php" class="btn ghost">Cancelar</a>
            </div>
        </form>
    </main>

    <script>
        // Preview da imagem ao selecionar arquivo
        document.getElementById('foto').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('previewFoto').src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>

</html>
<?php
if (!defined('ROOT_PATH')) {
  define('ROOT_PATH', __DIR__ . '/../..');
}
require_once ROOT_PATH . '/model/CampanhaModel/CampanhaDAO_class.php';
require_once ROOT_PATH . '/model/UsuarioModel/Usuario_class.php';
if (session_status() === PHP_SESSION_NONE) session_start();
$usuario = $_SESSION['usuario'] ?? null;

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
  header('Location: listar.php');
  exit;
}

$dao = new CampanhaDAO();
$post = $dao->findById($id);
if (!$post) {
  header('Location: listar.php');
  exit;
}
if (!$usuario || $post->getUsuarioId() != $usuario->getId()) {
  header('Location: listar.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editar Post - HelpConnect</title>
  <link rel="stylesheet" href="../assets/css/config.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/home.css">
  <link rel="stylesheet" href="../assets/css/posts.css">
</head>

<body>
  <?php include_once ROOT_PATH . '/view/assets/Static/Header.php'; ?>
  <main>
    <section class="donation" style="padding-top:6rem;">
      <div class="section-header">
        <div>
          <h2>Editar Post</h2>
          <p class="section-subtitle">Altere os dados do seu post</p>
        </div>
        <a href="ver.php?id=<?php echo $post->getId(); ?>" class="btn secondary">Cancelar</a>
      </div>

      <form action="../../controller/CampanhaController/edit.php" method="post" enctype="multipart/form-data" class="form-container" style="max-width:800px;margin:0 auto;background:var(--secondary-color);padding:2rem;border-radius:12px;">
        <input type="hidden" name="id" value="<?php echo $post->getId(); ?>" />
        <div class="form-group">
          <label>Título</label>
          <input type="text" name="titulo" required value="<?php echo htmlspecialchars($post->getTitulo()); ?>" />
        </div>
        <div class="form-group">
          <label>Descrição</label>
          <textarea name="descricao" rows="6" required><?php echo htmlspecialchars($post->getDescricao()); ?></textarea>
        </div>
        <div class="form-group">
          <label>Categoria</label>
          <input type="text" name="categoria" required value="<?php echo htmlspecialchars($post->getCategoria()); ?>" />
        </div>
        <div class="form-group">
          <label>Cidade</label>
          <input type="text" name="cidade" required value="<?php echo htmlspecialchars($post->getCidade()); ?>" />
        </div>
        <div class="form-group">
          <label>Tipo</label>
          <select name="tipo">
            <option value="necessidade" <?php echo $post->getTipo() == 'necessidade' ? 'selected' : ''; ?>>Necessidade</option>
            <option value="doacao" <?php echo $post->getTipo() == 'doacao' ? 'selected' : ''; ?>>Doação</option>
          </select>
        </div>
        <div class="form-group">
          <label>Imagem (opcional)</label>
          <input type="file" name="imagem" accept="image/*" />
          <?php if ($post->getImagem()): ?>
            <?php $preview = $post->getImagem();
            if (substr($preview, 0, 1) !== '/' && strpos($preview, 'http') !== 0) $preview = '/help-connect/' . ltrim($preview, '/'); ?>
            <div style="margin-top:8px;"><img src="<?php echo htmlspecialchars($preview); ?>" style="max-width:140px;border-radius:6px;" /></div>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <button type="submit" class="btn primary">Salvar Alterações</button>
        </div>
      </form>
    </section>
  </main>
  <?php include_once ROOT_PATH . '/view/assets/Static/Footer.php'; ?>
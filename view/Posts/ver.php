<?php
require_once __DIR__ . '/../../dao/PostDAO_class.php';
require_once __DIR__ . '/../../model/Usuario_class.php';
if (session_status() === PHP_SESSION_NONE) session_start();
$usuario = $_SESSION['usuario'] ?? null;

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) { header('Location: listar.php'); exit; }

$dao = new PostDAO();
$post = $dao->findById($id);
if (!$post) { header('Location: listar.php'); exit; }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ver Post - HelpConnect</title>
  <link rel="stylesheet" href="../assets/css/config.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/home.css">
  <link rel="stylesheet" href="../assets/css/posts.css">
</head>
<body>
<?php include_once __DIR__ . '/../assets/Header_Footer/Header.php'; ?>
<main>
  <section class="donation" style="padding-top:6rem;">
    <div class="section-header">
      <div>
        <h2><?php echo htmlspecialchars($post->getTitulo()); ?></h2>
        <p class="section-subtitle"><?php echo htmlspecialchars($post->getCategoria()); ?> — <?php echo htmlspecialchars($post->getCidade()); ?></p>
      </div>
      <div style="display:flex;gap:1rem;">
        <?php if ($usuario && $usuario->getId() == $post->getUsuarioId()): ?>
          <a href="editarPost.php?id=<?php echo $post->getId(); ?>" class="btn secondary">Editar</a>
          <a href="../../controller/PostController/delete.php?id=<?php echo $post->getId(); ?>" class="btn ghost" onclick="return confirm('Excluir este post?');">Excluir</a>
        <?php endif; ?>
      </div>
    </div>

    <div class="card" style="max-width:900px;margin:0 auto;">
      <div class="card-image">
        <img src="<?php echo htmlspecialchars($post->getImagem() ?: 'view/assets/img/provisorio/placeholder-card.svg'); ?>" alt="<?php echo htmlspecialchars($post->getTitulo()); ?>">
      </div>
      <div class="card-content">
        <h3><?php echo htmlspecialchars($post->getTitulo()); ?></h3>
        <p class="card-location">📍 <?php echo htmlspecialchars($post->getCidade()); ?></p>
        <p class="card-description"><?php echo nl2br(htmlspecialchars($post->getDescricao())); ?></p>
        <div class="card-meta">
          <span class="meta-tag"><?php echo htmlspecialchars($post->getCategoria()); ?></span>
          <span class="meta-tag"><?php echo htmlspecialchars($post->getTipo()); ?></span>
        </div>
      </div>
    </div>
  </section>
</main>
<?php include_once __DIR__ . '/../assets/Header_Footer/Footer.php'; ?>

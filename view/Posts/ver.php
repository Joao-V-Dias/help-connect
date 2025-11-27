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

    <div class="post-page" style="padding-bottom:4rem;">
      <div class="post-hero">
        <div class="post-hero-image">
          <?php
            $img = $post->getImagem() ?: 'view/assets/img/provisorio/placeholder-card.svg';
            if (substr($img,0,1) !== '/' && strpos($img, 'http') !== 0) {
              $img = '/help-connect/' . ltrim($img, '/');
            }
          ?>
          <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($post->getTitulo()); ?>">
        </div>
        <div class="post-hero-info">
          <h1><?php echo htmlspecialchars($post->getTitulo()); ?></h1>
          <p class="post-meta">
            <strong><?php echo htmlspecialchars($post->getCategoria()); ?></strong>
            &nbsp;•&nbsp; <?php echo htmlspecialchars($post->getCidade()); ?>
            &nbsp;•&nbsp; <?php echo htmlspecialchars(ucfirst($post->getTipo())); ?>
            &nbsp;•&nbsp; <?php echo htmlspecialchars($post->getCreatedAt()); ?>
          </p>
          <p class="post-intro">Conecte-se com quem está precisando. Aqui você encontra detalhes e como ajudar.</p>
        </div>
      </div>

      <div class="post-body-wrapper">
        <article class="post-body">
          <?php echo nl2br(htmlspecialchars($post->getDescricao())); ?>
        </article>

        <aside class="post-side">
          <div class="author-box">
            <div class="author-avatar"><img src="/help-connect/view/assets/img/icon/avatar-placeholder.svg" alt="Autor" /></div>
            <div class="author-info">
              <div class="author-name">Publicado por</div>
              <div class="author-meta">Usuário ID: <?php echo htmlspecialchars($post->getUsuarioId()); ?></div>
            </div>
          </div>

          <div class="post-actions">
            <?php if ($usuario && $usuario->getId() == $post->getUsuarioId()): ?>
              <a href="editarPost.php?id=<?php echo $post->getId(); ?>" class="btn secondary">Editar</a>
              <a href="../../controller/PostController/delete.php?id=<?php echo $post->getId(); ?>" class="btn ghost" onclick="return confirm('Excluir este post?');">Excluir</a>
            <?php else: ?>
              <a href="../Usuario/cadastrar.php" class="btn primary">Oferecer Ajuda</a>
              <a href="../Usuario/login.php" class="btn secondary">Entrar para Conectar</a>
            <?php endif; ?>
          </div>

          <div class="post-stats">
            <div class="stat"><strong>Visualizações</strong><div>--</div></div>
            <div class="stat"><strong>Candidatos</strong><div>--</div></div>
          </div>
        </aside>
      </div>
    </div>
  </section>
</main>
<?php include_once __DIR__ . '/../assets/Header_Footer/Footer.php'; ?>

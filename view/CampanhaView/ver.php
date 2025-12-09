<?php
if (!defined('ROOT_PATH')) {
  define('ROOT_PATH', __DIR__ . '/../..');
}
require_once __DIR__ . '/../../model//CampanhaModel/CampanhaDAO_class.php';
require_once __DIR__ . '/../../model/UsuarioModel/Usuario_class.php';
require_once __DIR__ . '/../../model/UsuarioModel/UsuarioDAO_class.php';
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
  <?php include_once ROOT_PATH . '/view/assets/Static/Header.php'; ?>
  <main>
    <section class="donation" style="padding-top:6rem;">
      <div class="section-header">
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
            if (substr($img, 0, 1) !== '/' && strpos($img, 'http') !== 0) {
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
          </div>
        </div>

        <div class="post-body-wrapper">
          <article class="post-body">
            <?php echo nl2br(htmlspecialchars($post->getDescricao())); ?>
          </article>

          <aside class="post-side">
            <div class="author-box">
              <?php
              $autor = null;
              if ($post->getUsuarioId()) {
                $uDao = new UsuarioDAO();
                $autor = $uDao->buscar($post->getUsuarioId());
              }
              $authorImg = '/help-connect/view/assets/img/icon/avatar-placeholder.svg';
              $authorName = 'Usuário ID: ' . htmlspecialchars($post->getUsuarioId());
              if ($autor) {
                $authorName = htmlspecialchars($autor->getNome() ?: $authorName);
                $fotoDb = $autor->getFoto();
                if ($fotoDb) {
                  if (strpos($fotoDb, 'assets/img/usuarios/') === 0) {
                    $authorImg = '/help-connect/view/' . $fotoDb;
                  } else if (substr($fotoDb, 0, 1) === '/' || strpos($fotoDb, 'http') === 0) {
                    $authorImg = $fotoDb;
                  } else {
                    $authorImg = '/help-connect/view/assets/img/usuarios/' . $fotoDb;
                  }
                }
              }
              ?>

              <div class="author-avatar"><a href="/help-connect/usuario.php?fun=buscar&id=<?php echo htmlspecialchars($post->getUsuarioId()); ?>"><img src="<?php echo $authorImg; ?>" alt="<?php echo $authorName; ?>" /></a></div>
              <div class="author-info">
                <div class="author-name">Publicado por <?php echo $authorName; ?></div>
                <?php if ($autor && $autor->getCidade()): ?>
                  <div class="author-meta"><?php echo htmlspecialchars($autor->getCidade()); ?></div>
                <?php else: ?>
                  <div class="author-meta">&nbsp;</div>
                <?php endif; ?>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </section>
  </main>
  <?php include_once ROOT_PATH . '/view/assets/Static/Footer.php'; ?>
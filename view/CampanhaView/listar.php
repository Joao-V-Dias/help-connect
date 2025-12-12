<?php
if (!defined('ROOT_PATH')) {
  define('ROOT_PATH', __DIR__ . '/../..');
}
require_once ROOT_PATH . '/model/UsuarioModel/Usuario_class.php';
require_once ROOT_PATH . '/model/CampanhaModel/CampanhaDAO_class.php';
if (session_status() === PHP_SESSION_NONE) session_start();
$usuario = $_SESSION['usuario'] ?? null;

$dao = new CampanhaDAO();
$rows = $dao->findAll();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Listar Posts - HelpConnect</title>
  <link rel="stylesheet" href="../assets/css/config.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/home.css">
  <link rel="stylesheet" href="../assets/css/posts.css">
</head>

<body>
  <?php include_once __DIR__ . '/../assets/Static/Header.php'; ?>
  <main>
    <section class="donation" style="padding-top:6rem;">
      <div class="section-header">
        <div>
          <h2>Campanhas</h2>
        </div>
        <a href="cadastrar.php" class="btn primary">Criar campanha</a>
      </div>

      <div class="donation-cards-grid">
        <?php foreach ($rows as $row): ?>
          <a href="ver.php?id=<?php echo $row['id']; ?>" class="card">
            <div class="card-image">
              <?php
              $img = $row['imagem'] ?: 'view/assets/img/provisorio/placeholder-card.svg';
              if (substr($img, 0, 1) !== '/' && strpos($img, 'http') !== 0) {
                $img = '/help-connect/' . ltrim($img, '/');
              }
              ?>
              <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($row['titulo']); ?>">
            </div>
            <div class="card-content">
              <h3><?php echo htmlspecialchars($row['titulo']); ?></h3>
              <p class="card-location">📍 <?php echo htmlspecialchars($row['cidade']); ?></p>
              <p class="card-description"><?php echo nl2br(htmlspecialchars($row['descricao'])); ?></p>
              <div class="card-meta">
                <span class="meta-tag"><?php echo htmlspecialchars($row['categoria']); ?></span>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </section>
  </main>
  <?php include_once __DIR__ . '/../assets/Static/Footer.php'; ?>
</body>
<?php
require_once __DIR__ . '/../../../model/Usuario_class.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$usuario = $_SESSION["usuario"] ?? null;

$imagePath = '/help-connect/view/assets/img/usuarios/default.jpg';
if ($usuario && $usuario->getFoto()) {
  $fotoDb = $usuario->getFoto();
  if (strpos($fotoDb, 'assets/img/usuarios/') === 0) {
    $imagePath = '/help-connect/view/' . $fotoDb;
  } else {
    $imagePath = '/help-connect/view/assets/img/usuarios/' . $fotoDb;
  }
}
?>

<header>
  <a href="/help-connect/index.php"><img src="/help-connect/view/assets/img/icon/logo.svg" alt="logo do site" class="logo" /></a>
  <nav class="menu">
    <a href="">Necessidades</a><a href="">Doações</a><a href="">Sobre</a>
  </nav>
  <?php
  if ($usuario) {
    echo '<a href="/help-connect/view/Usuario/editarUsuario.php"><img src="' . $imagePath . '" alt="foto do usuario" class="user-img"/></a>';
  } else {
    echo '<div class="login-btn"> <a href="/help-connect/view/Usuario/login.php">Fazer login</a> </div>';
  }
  ?>
</header>
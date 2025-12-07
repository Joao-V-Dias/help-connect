<?php
require_once ROOT_PATH . '/model/UsuarioModel/Usuario_class.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$usuario = $_SESSION["usuario"] ?? null;
?>

<header>
  <a href="/help-connect/index.php"><img src="/help-connect/view/assets/img/icon/logo.svg" alt="logo do site" class="logo" /></a>
  <nav class="menu">
    <a href="/help-connect/view/Posts/listar.php?tipo=necessidade">Campanhas</a>
    <a href="/help-connect/view/sobre.php">Quem somos</a>
    <?php
    if ($usuario) {
      echo '<a href="/help-connect/view/Usuario/editarUsuario.php"><img src="' . ROOT_PATH . $usuario->getFoto() . '" alt="foto do usuario" class="user-img"/></a>';
    } else {
      echo '<div > <a id="login-btn" href="/help-connect/view/UsuarioView/login.php">Fazer login</a> </div>';
    }
    ?>
  </nav>
  <button class="hamburger" aria-label="Abrir menu" aria-expanded="false" aria-controls="mobileMenu">
    <span class="hamburger-box"><span class="hamburger-inner"></span></span>
  </button>

</header>

<div id="mobileMenu" class="menu-mobile" aria-hidden="true">
  <div class="menu-mobile-inner">
    <nav>
      <a href="/help-connect/view/Posts/listar.php?tipo=necessidade">Necessidades</a>
      <a href="/help-connect/view/Posts/listar.php?tipo=doacao">Doações</a>
      <a href="/help-connect/view/Posts/cadastrar.php?tipo=necessidade">Publicar</a>
      <a href="/help-connect/view/sobre.php">Sobre</a>
    </nav>
    <div class="menu-mobile-user">
      <?php if ($usuario): ?>
        <a href="/help-connect/view/Usuario/editarUsuario.php" class="mobile-user-link">Minha conta</a>
      <?php else: ?>
        <a href="/help-connect/view/Usuario/login.php" class="mobile-user-link">Fazer login</a>
      <?php endif; ?>
    </div>
  </div>
</div>
<script src="/help-connect/view/assets/js/mobileNav.js"></script>
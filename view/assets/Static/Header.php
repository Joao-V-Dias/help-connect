<?php
require_once ROOT_PATH . '/model/UsuarioModel/Usuario_class.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}


$usuario = $_SESSION["usuario"] ?? null;
?>

<header>
  <a href="http://localhost/help-connect"><img src="/help-connect/view/assets/img/icon/logo.svg" alt="logo do site" class="logo" /></a>
  <nav class="menu">
    <a href="/help-connect/view/CampanhaView/listar.php?tipo=necessidade" class="link-header">Campanhas</a>
    <a href="/help-connect/view/sobre.php" class="link-header">Quem somos</a>
    <?php
    if ($usuario) {
      echo '<a href="/help-connect/view/UsuarioView/editarUsuario.php"><img src="' . '/help-connect/view/' . $usuario->getFoto() . '" alt="foto do usuario ' . $usuario->getNome() . '" class="user-img"/></a>';
    } else {
      echo '<div> <a id="login-btn" href="/help-connect/view/UsuarioView/login.php">Fazer login</a> </div>';
    }
    ?>
  </nav>
  <!-- <button class="hamburger" aria-label="Abrir menu" aria-expanded="false" aria-controls="mobileMenu">
    <span class="hamburger-box"><span class="hamburger-inner"></span></span>
  </button> -->

</header>
<script src="/help-connect/view/assets/js/mobileNav.js"></script>
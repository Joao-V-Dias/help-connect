<?php
require_once __DIR__ . '/../../../model/Usuario_class.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$usuario = $_SESSION["usuario"] ?? null;
?>

<header>
  <a href="#"><img src="./view/assets/img/icon/logo.svg" alt="logo do site" class="logo" /></a>
  <nav class="menu">
    <a href="">Necessidades</a><a href="">Doações</a><a href="">Sobre</a>
  </nav>
  <?php
  if ($usuario) {
    echo '<a href=""><img src="./view/' . $usuario->getFoto() . '" alt="foto do usuario" class="user-img"/></a>';
  } else {
    echo '<div class="login-btn"> <a href="./view/Usuario/login.php">Fazer login</a> </div>';
  }
  ?>
</header>
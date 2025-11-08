<?php
include_once "./model/Usuario_class.php";
session_start();
$usuario = $_SESSION["usuario"] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./view/assets/css/home.css" />
  <link
    rel="shortcut icon"
    href="./assets/img/icon/logo.svg"
    type="image/x-icon" />
  <title>HelpConnect</title>
</head>

<body>
  <?php
  include_once "./view/assets/Header_Footer/Header.php";
  ?>
  <main>
    <section class="hero">
      <div class="hero-content">
        <h1>HelpConnect</h1>
        <p>
          Conectando quem <span>precisa</span> com quem
          <span>pode</span> ajudar.
        </p>
        <a href="">Quero ajudar</a>
        <a href="">Quero ser ajudado</a>
      </div>
      <video autoplay muted loop id="video-1" class="hero-img">
        <source src="./view/assets/img/video/teste1.mp4" type="video/mp4">
      </video>
    </section>
    <section class="donation">
      <div class="title-content">
        <h2>Últimas doações</h2>
        <a href="#">Ver mais</a>
      </div>
      <div class="donation-card">
        <div class="card"><img src="" alt="">
          <h3>titulo do card</h3>
          <p>Quem postou</p>
        </div>
        <div class="card"><img src="" alt="">
          <h3>titulo do card</h3>
          <p>Quem postou</p>
        </div>
      </div>
      <div class="card"><img src="" alt="">
        <h3>titulo do card</h3>
        <p>Quem postou</p>
      </div>
      </div>
      <div class="card"><img src="" alt="">
        <h3>titulo do card</h3>
        <p>Quem postou</p>
      </div>
      </div>
      </div>
    </section>
  </main>
  <!-- <?php
        // include_once "./view/assets/Header_Footer/Footer.php";
        ?> -->
</body>

</html>
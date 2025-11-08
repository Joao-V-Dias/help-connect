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
  <!-- <?php
        //include_once "./view/assets/Header_Footer/Header.php";
        ?> -->
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
      <div class="hero-img">
        <video autoplay muted loop id="video-1">
          <source src="./view/assets/img/video/teste1.mp4" type="video/mp4">
        </video>
        <video autoplay muted loop id="video-2">
          <source src="./view/assets/img/video/teste2.mp4" type="video/mp4">
        </video>
        <video autoplay muted loop id="video-3">
          <source src="./view/assets/img/video/teste3.mp4" type="video/mp4">
        </video>
      </div>
    </section>
  </main>
  <!-- <?php
        // include_once "./view/assets/Header_Footer/Footer.php";
        ?> -->
</body>

</html>
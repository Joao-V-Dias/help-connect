<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - HelpConnect</title>
  <link rel="stylesheet" href="../assets/css/usuario.css">
</head>

<body>
  <div class="form-container">
    <header class="form-header">
      <h1>HelpConnect</h1>
      <h2>Faça Login</h2>
      <?php
        if (isset($_SESSION['erro_login'])) {
          echo '<p id="error-message">'.$_SESSION['erro_login'].'</p>';
        }
      ?>
    </header>
    <form class="form" action="../../usuario.php?fun=login" method="POST">
      <div class="form-group">
        <label for="email">E-mail:</label>
        <input
          type="email"
          id="email"
          name="email"
          required
          placeholder="seu.email@exemplo.com" />
      </div>
      <div class="form-group">
        <label for="password">Senha:</label>
        <input
          type="password"
          id="password"
          name="senha"
          required
          placeholder="********" />
      </div>
      <button type="submit" class="form-button" name="login">Entrar</button>
    </form>
    <div class="form-links">
      <a href="#">Esqueci minha senha</a>
      <span>|</span>
      <a href="./cadastrar.php">Criar uma conta</a>
    </div>
  </div>
</body>

</html>
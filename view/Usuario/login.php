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
      </header>
      <form class="form" action="#" method="POST">
        <div class="form-group">
          <label for="email">E-mail:</label>
          <input
            type="email"
            id="email"
            name="email"
            required
            placeholder="seu.email@exemplo.com"
          />
        </div>
        <div class="form-group">
          <label for="password">Senha:</label>
          <input
            type="password"
            id="password"
            name="password"
            required
          />
        </div>
        <button type="submit" class="form-button">Entrar</button>
      </form>
      <div class="form-links">
        <a href="#">Esqueci minha senha</a>
        <span>|</span>
        <a href="./cadastrar.php">Criar uma conta</a>
      </div>
    </div>
  </body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro - HelpConnect</title>
    <link rel="stylesheet" href="../assets/css/usuario.css">
    <style>
    </style>
  </head>
  <body>
    <div class="form-container">
      <header class="form-header">
        <h1>HelpConnect</h1>
        <h2>Crie sua Conta</h2>
      </header>
      <form id="cadastroForm" class="form" action="../../usuario.php?fun=cadastrar" method="POST" enctype="multipart/form-data">
        <div class="progress-bar-container">
          <div class="progress-bar" id="progressBar"></div>
        </div>
        <div class="form-step active">
          <div class="form-group">
            <label for="nome">Nome Completo:</label>
            <input
              type="text"
              id="nome"
              name="nome"
              required
              placeholder="Seu nome"
            />
          </div>
          <div class="form-group">
            <label for="cidade">Cidade:</label>
            <input
              type="text"
              id="cidade"
              name="cidade"
              required
              placeholder="Sua cidade"
            />
          </div>
          <button type="button" class="form-button" onclick="nextStep()">
            Próximo
          </button>
        </div>
        <div class="form-step">
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
            <label for="telefone">Telefone:</label>
            <input
              type="tel"
              id="telefone"
              name="telefone"
              required
              placeholder="(XX) XXXXX-XXXX"
            />
          </div>
          <button type="button" class="form-button" onclick="prevStep()">
            Voltar
          </button>
          <button type="button" class="form-button" onclick="nextStep()">
            Próximo
          </button>
        </div>
        <div class="form-step">
          <div class="form-group">
            <label for="foto">Foto de Perfil:</label>
            <input
              type="file"
              id="foto"
              name="foto"
              accept="image/*"
              
            />
          </div>
          <div class="form-group">
            <label>Pré-visualização:</label>
            <div class="form-image-content">
              <img id="fotoPreview" src="#" alt="Pré-visualização da Foto" class="form-image" />
            </div>
          </div>
          <button type="button" class="form-button" onclick="prevStep()">
            Voltar
          </button>
          <button type="button" class="form-button" onclick="nextStep()">
            Próximo
          </button>
        </div>
        <div class="form-step">
          <div class="form-group">
            <label for="password">Senha:</label>
            <input
              type="password"
              id="password"
              name="senha"
              required
              placeholder="Mínimo de 8 caracteres"
            />
          </div>
          <div class="form-group">
            <label for="confirmPassword">Confirme a Senha:</label>
            <input
              type="password"
              id="confirmPassword"
              name="confirmarSenha"
              required
              placeholder="Confirme sua senha"
            />
          </div>
          <button type="button" class="form-button" onclick="prevStep()">
            Voltar
          </button>
          <button type="submit" class="form-button" name="enviar">Finalizar Cadastro</button>
        </div>
      </form>
      <div class="form-links">
        Já tem uma conta? <a href="./login.php">Faça Login</a>
      </div>
    </div>
    <script src="../assets/js/cadastrar.js"></script>
  </body>
</html>
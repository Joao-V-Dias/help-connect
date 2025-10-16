<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro - HelpConnect</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

      :root {
        /* color */
        --primary-color: #002147;
        --secondary-color: #ffffff;
        --tertiary-color: #cc0202;
        --quaternary-color: #182746;
        /* fonts */
        --font-size-xl: 96px;
        --font-size-lg: 32px;
        --font-size-md: 20px;
        --font-size-sm: 16px;
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }

      body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: var(--primary-color);
        color: var(--primary-color);
      }

      .form-container {
        background-color: var(--secondary-color);
        padding: 2.5rem;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 450px;
        text-align: center;
      }

      .form-header h1 {
        font-size: var(--font-size-lg);
        color: var(--primary-color);
        margin-bottom: 0.5rem;
      }

      .form-header h2 {
        font-size: var(--font-size-md);
        color: var(--quaternary-color);
        font-weight: 400;
        margin-bottom: 2rem;
      }

      .form {
        display: flex;
        flex-direction: column;
      }

      .form-group {
        margin-bottom: 1.5rem;
        text-align: left;
      }

      .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        font-size: var(--font-size-sm);
      }

      .form-group input {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: var(--font-size-sm);
      }

      .form-group input::placeholder {
        color: #aaa;
      }

      .form-button {
        background-color: var(--primary-color);
        color: var(--secondary-color);
        border: none;
        padding: 0.9rem;
        border-radius: 5px;
        font-size: var(--font-size-md);
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 1rem;
      }

      .form-button:hover {
        background-color: var(--quaternary-color);
      }

      .form-links {
        margin-top: 1.5rem;
        font-size: 14px;
      }

      .form-links a {
        color: var(--primary-color);
        text-decoration: none;
      }

      .form-links a:hover {
        text-decoration: underline;
      }

      .form-links span {
        color: #ccc;
        margin: 0 0.5rem;
      }

      .progress-bar-container {
        width: 100%;
        background-color: #e0e0e0;
        border-radius: 5px;
        height: 8px;
        margin-bottom: 2rem;
      }

      .progress-bar {
        height: 100%;
        width: 33.33%;
        background-color: var(--primary-color);
        border-radius: 5px;
        transition: width 0.4s ease-in-out;
      }

      .form-step {
        display: none;
      }

      .form-step.active {
        display: block;
      }
    </style>
  </head>
  <body>
    <div class="form-container">
      <header class="form-header">
        <h1>HelpConnect</h1>
        <h2>Crie sua Conta</h2>
      </header>
      <form id="cadastroForm" class="form" action="usuario.php?fun=cadastrar" method="POST" enctype="multipart/form-data">
        <div class="progress-bar-container">
          <div class="progress-bar" id="progressBar"></div>
        </div>

        <!-- Step 1 -->
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

        <!-- Step 2 -->
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

        <!-- Step 3 -->
        <div class="form-step">
          <div class="form-group">
            <label for="password">Senha:</label>
            <input
              type="password"
              id="password"
              name="password"
              required
              placeholder="Mínimo de 8 caracteres"
            />
          </div>
          <div class="form-group">
            <label for="confirmPassword">Confirme a Senha:</label>
            <input
              type="password"
              id="confirmPassword"
              name="confirmPassword"
              required
              placeholder="Confirme sua senha"
            />
          </div>
          <button type="button" class="form-button" onclick="prevStep()">
            Voltar
          </button>
          <button type="submit" class="form-button" disable>Finalizar Cadastro</button>
        </div>
      </form>
      <div class="form-links">
        Já tem uma conta? <a href="login.html">Faça Login</a>
      </div>
    </div>

    <script>
      const steps = document.querySelectorAll(".form-step");
      const progressBar = document.getElementById("progressBar");
      let currentStep = 0;

      function updateStep() {
        steps.forEach((step, index) => {
          step.classList.toggle("active", index === currentStep);
        });
        progressBar.style.width = `${
          ((currentStep + 1) / steps.length) * 100
        }%`;
      }

      function nextStep() {
        if (currentStep < steps.length - 1) {
          currentStep++;
          updateStep();
        }
      }

      function prevStep() {
        if (currentStep > 0) {
          currentStep--;
          updateStep();
        }
      }
    </script>
  </body>
</html>
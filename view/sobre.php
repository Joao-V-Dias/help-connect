<?php
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . '/..');
}
require_once ROOT_PATH . '/model/UsuarioModel/Usuario_class.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$usuario = $_SESSION['usuario'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sobre - HelpConnect</title>
    <link rel="stylesheet" href="./assets/css/config.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/sobre.css">
</head>

<body>
    <?php include_once ROOT_PATH . '/view/assets/Static/Header.php'; ?>

    <main class="sobre-main">
        <!-- Hero Section -->
        <section class="sobre-hero">
            <div class="hero-content">
                <h1>Sobre HelpConnect</h1>
                <p>Conectando quem precisa com quem pode ajudar.</p>
            </div>
            <img src="./assets/img/provisorio/fachada.png" alt="Pessoas ajudando" class="hero-image">
        </section>

        <!-- Missão -->
        <section class="sobre-section missao">
            <div class="section-content">
                <div class="text-content">
                    <h2>Nossa Missão</h2>
                    <p>
                        Criar uma comunidade solidária onde pessoas com expertise e recursos possam conectar com aquelas que necessitam de ajuda.
                        Acreditamos que a colaboração e o apoio mútuo são fundamentais para construir uma sociedade mais justa e inclusiva.
                    </p>
                    <ul>
                        <li>✓ Facilitar conexões significativas</li>
                        <li>✓ Promover solidariedade comunitária</li>
                        <li>✓ Empoderar pessoas através do compartilhamento</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Visão -->
        <section class="sobre-section visao">
            <div class="section-content reverse">
                <img src="./assets/img/provisorio/visao.png" alt="Visão" class="section-image">
                <div class="text-content">
                    <h2>Nossa Visão</h2>
                    <p>
                        Ser a plataforma de referência para conectar pessoas dispostas a ajudar com aquelas que enfrentam dificuldades.
                        <br>Queremos viver em um mundo onde a solidariedade transcende barreiras e todos têm acesso ao suporte que precisam.
                    </p>
                    <ul>
                        <li>✓ Transformar vidas através da solidariedade</li>
                        <li>✓ Criar oportunidades de impacto social</li>
                        <li>✓ Fortalecer comunidades locais</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Valores -->
        <section class="sobre-section valores">
            <h2>Nossos Valores</h2>
            <div class="valores-grid">
                <div class="valor-card">
                    <div class="valor-icon">❤️</div>
                    <h3>Solidariedade</h3>
                    <p>Acreditamos na força da ajuda mútua e do suporte genuíno entre pessoas.</p>
                </div>

                <div class="valor-card">
                    <div class="valor-icon">🤝</div>
                    <h3>Confiança</h3>
                    <p>Construímos uma comunidade baseada em confiança, segurança e transparência.</p>
                </div>

                <div class="valor-card">
                    <div class="valor-icon">🌟</div>
                    <h3>Impacto</h3>
                    <p>Cada ação conta. Buscamos gerar impacto positivo e tangível na vida das pessoas.</p>
                </div>

                <div class="valor-card">
                    <div class="valor-icon">🌍</div>
                    <h3>Inclusão</h3>
                    <p>Somos inclusivos e acessíveis a todos, independentemente de origem ou situação.</p>
                </div>
            </div>
        </section>

        <!-- Como Funciona -->
        <section class="sobre-section como-funciona">
            <h2>Como Funciona</h2>
            <div class="passos-container">
                <div class="passo">
                    <div class="passo-numero">1</div>
                    <h3>Cadastre-se</h3>
                    <p>Crie sua conta e complete seu perfil com informações sobre você.</p>
                </div>

                <div class="passo-seta">→</div>

                <div class="passo">
                    <div class="passo-numero">2</div>
                    <h3>Procure ou Ofereça</h3>
                    <p>Procure por pessoas que precisam ou ofereça sua ajuda para a comunidade.</p>
                </div>

                <div class="passo-seta">→</div>

                <div class="passo">
                    <div class="passo-numero">3</div>
                    <h3>Conecte-se</h3>
                    <p>Estabeleça contato com pessoas e forme conexões significativas.</p>
                </div>

                <div class="passo-seta">→</div>

                <div class="passo">
                    <div class="passo-numero">4</div>
                    <h3>Faça a Diferença</h3>
                    <p>Colabore e deixe um impacto positivo na vida de outros.</p>
                </div>
            </div>
        </section>

        <!-- Estatísticas -->
        <section class="sobre-section stats">
            <h2>Nosso Impacto</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">1.2K+</div>
                    <p>Usuários Ativos</p>
                </div>

                <div class="stat-card">
                    <div class="stat-number">500+</div>
                    <p>Pessoas Ajudadas</p>
                </div>

                <div class="stat-card">
                    <div class="stat-number">100+</div>
                    <p>Comunidades</p>
                </div>

                <div class="stat-card">
                    <div class="stat-number">98%</div>
                    <p>Satisfação</p>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="sobre-section cta">
            <h2>Junte-se à Nossa Comunidade</h2>
            <p>Comece a fazer a diferença hoje mesmo</p>
            <div class="cta-buttons">
                <?php if (!$usuario): ?>
                    <a href="./view/Usuario/cadastrar.php" class="btn primary">Cadastrar-se Agora</a>
                    <a href="./view/Usuario/login.php" class="btn secondary">Já Tenho Conta</a>
                <?php else: ?>
                    <a href="/help-connect/index.php" class="btn primary">Voltar ao Início</a>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <?php include_once ROOT_PATH . '/view/assets/Static/Footer.php'; ?>
</body>

</html>
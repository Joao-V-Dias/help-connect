<?php
define("ROOT_PATH", __DIR__);
require_once ROOT_PATH . "/model/UsuarioModel/Usuario_class.php";
require_once ROOT_PATH . '/model/CampanhaModel/CampanhaDAO_class.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$usuario = $_SESSION["usuario"] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./view/assets/css/config.css" />
  <link rel="stylesheet" href="./view/assets/css/style.css" />
  <link rel="stylesheet" href="./view/assets/css/home.css" />
  <link rel="shortcut icon" href="./view/assets/img/icon/logo.svg" type="image/x-icon" />
  <title>HelpConnect - Conectando Quem Precisa com Quem Pode Ajudar</title>
</head>

<body>
  <?php include_once ROOT_PATH . "/view/assets/Static/Header.php"; ?>

  <main>
    <section class="hero">
      <div class="hero-content">
        <h1>HelpConnect</h1>
        <p>
          Conectando quem <span>precisa</span> com quem
          <span>pode</span> ajudar.
        </p>
        <div class="hero-buttons">
          <a href="./view/Posts/listar.php?tipo=necessidade" class="btn primary">Quero Ajudar</a>
          <a href="./view/Posts/cadastrar.php?tipo=necessidade" class="btn secondary">Quero criar uma campanha</a>
        </div>
      </div>
      <video autoplay muted loop id="video-1" class="hero-img">
        <source src="./view/assets/img/video/teste1.mp4" type="video/mp4">
      </video>
    </section>

    <section class="como-funciona-home">
      <h2>Como Funciona</h2>
      <div class="passos-grid">
        <div class="passo-item">
          <div class="passo-icon">1️⃣</div>
          <h3>Cadastre-se</h3>
          <p>Crie sua conta gratuitamente com seus dados</p>
        </div>
        <div class="passo-item">
          <div class="passo-icon">2️⃣</div>
          <h3>Complete o Perfil</h3>
          <p>Conte sobre você e suas necessidades</p>
        </div>
        <div class="passo-item">
          <div class="passo-icon">3️⃣</div>
          <h3>Conecte-se</h3>
          <p>Encontre pessoas que podem ajudar ou que você pode ajudar</p>
        </div>
        <div class="passo-item">
          <div class="passo-icon">4️⃣</div>
          <h3>Colabore</h3>
          <p>Comece a fazer a diferença na vida de outros</p>
        </div>
      </div>
    </section>

    <section class="donation">
      <div class="section-header">
        <div>
          <h2>Últimas Necessidades</h2>
          <p class="section-subtitle">Pessoas que estão buscando ajuda agora</p>
        </div>
        <a href="./view/Posts/listar.php?tipo=necessidade" class="btn secondary">Ver Mais</a>
      </div>
      <div class="donation-cards-grid">
        <?php
        $postDao = new CampanhaDAO();
        $rows = $postDao->findAllByTipo('necessidade');
        $posts = array_slice($rows, 0, 4);

        if (count($posts) > 0):
          foreach ($posts as $row):
            $img = $row['imagem'] ?: 'view/assets/img/provisorio/placeholder-card.svg';
            if (substr($img, 0, 1) !== '/' && strpos($img, 'http') !== 0) {
              $img = '/help-connect/' . ltrim($img, '/');
            }
            $isRecent = false;
            if (!empty($row['created_at'])) {
              $isRecent = (strtotime($row['created_at']) >= time() - 7 * 24 * 3600);
            }
        ?>
            <a href="./view/Posts/ver.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="card">
              <div class="card-image">
                <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($row['titulo']); ?>">
                <?php if ($isRecent): ?>
                  <span class="card-badge">Novo</span>
                <?php else: ?>
                  <span class="card-badge"><?php echo htmlspecialchars(ucfirst($row['tipo'])); ?></span>
                <?php endif; ?>
              </div>
              <div class="card-content">
                <h3><?php echo htmlspecialchars($row['titulo']); ?></h3>
                <p class="card-location">📍 <?php echo htmlspecialchars($row['cidade']); ?></p>
                <p class="card-description"><?php echo nl2br(htmlspecialchars($row['descricao'])); ?></p>
                <div class="card-meta">
                  <span class="meta-tag"><?php echo htmlspecialchars($row['categoria']); ?></span>
                </div>
              </div>
            </a>
          <?php
          endforeach;
        else:
          for ($i = 0; $i < 4; $i++):
          ?>
            <div class="card">
              <div class="card-image">
                <img src="./view/assets/img/provisorio/placeholder-card.svg" alt="placeholder">
              </div>
              <div class="card-content">
                <h3>Sem publicações</h3>
                <p class="card-location">—</p>
                <p class="card-description">Nenhuma necessidade publicada ainda. Seja o primeiro a criar uma.</p>
                <div class="card-meta">
                  <span class="meta-tag">—</span>
                </div>
              </div>
            </div>
        <?php
          endfor;
        endif;
        ?>
      </div>
    </section>

    <section class="categorias">
      <h2>Categorias de Ajuda</h2>
      <div class="categorias-grid">
        <div class="categoria-card">
          <div class="categoria-icon">🍽️</div>
          <h3>Alimentação</h3>
          <p>Compartilhar alimentos e refeições</p>
        </div>
        <div class="categoria-card">
          <div class="categoria-icon">📚</div>
          <h3>Educação</h3>
          <p>Aulas, tutoria e aprendizado</p>
        </div>
        <div class="categoria-card">
          <div class="categoria-icon">🔧</div>
          <h3>Serviços</h3>
          <p>Reparos e trabalhos técnicos</p>
        </div>
        <div class="categoria-card">
          <div class="categoria-icon">💚</div>
          <h3>Saúde</h3>
          <p>Apoio e orientação de saúde</p>
        </div>
        <div class="categoria-card">
          <div class="categoria-icon">🏠</div>
          <h3>Moradia</h3>
          <p>Busca e ofertas de moradia</p>
        </div>
        <div class="categoria-card">
          <div class="categoria-icon">💼</div>
          <h3>Trabalho</h3>
          <p>Oportunidades e ofertas</p>
        </div>
      </div>
    </section>

    <section class="testimonials">
      <h2>O Que Dizem Sobre Nós</h2>
      <div class="testimonials-grid">
        <div class="testimonial-card">
          <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
          <p class="testimonial-text">"HelpConnect mudou minha vida. Encontrei ajuda quando mais precisava e agora posso ajudar outros!"</p>
          <p class="testimonial-author">— Maria Silva, São Paulo</p>
        </div>

        <div class="testimonial-card">
          <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
          <p class="testimonial-text">"A comunidade é incrível. Consegui reforço escolar e minha nota subiu bastante!"</p>
          <p class="testimonial-author">— João Santos, Rio de Janeiro</p>
        </div>

        <div class="testimonial-card">
          <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
          <p class="testimonial-text">"Pude ajudar várias pessoas com meu conhecimento. Muito gratificante!"</p>
          <p class="testimonial-author">— Ana Costa, Belo Horizonte</p>
        </div>
      </div>
    </section>

    <section class="cta-final">
      <h2>Comece a Fazer a Diferença Hoje</h2>
      <p>Junte-se a nossa comunidade de pessoas solidárias</p>
      <?php if (!$usuario): ?>
        <div class="cta-buttons">
          <a href="./view/Usuario/cadastrar.php" class="btn primary">Cadastrar Agora</a>
          <a href="./view/sobre.php" class="btn ghost">Saiba Mais Sobre Nós</a>
        </div>
      <?php else: ?>
        <p class="welcome-msg">Bem-vindo, <?php echo htmlspecialchars($usuario->getNome()); ?>!</p>
      <?php endif; ?>
    </section>
  </main>

  <?php include_once "./view/assets/Static/Footer.php"; ?>
</body>

</html>
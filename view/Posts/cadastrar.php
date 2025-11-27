<?php
require_once __DIR__ . '/../../model/Usuario_class.php';
if (session_status() === PHP_SESSION_NONE) session_start();
$usuario = $_SESSION['usuario'] ?? null;
if (!$usuario) {
  header('Location: ../../Usuario/login.php');
  exit;
}
?>
<?php ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastrar Post - HelpConnect</title>
  <link rel="stylesheet" href="../assets/css/config.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/home.css">
  <link rel="stylesheet" href="../assets/css/posts.css">
</head>

<body>
  <?php include_once __DIR__ . '/../assets/Header_Footer/Header.php'; ?>
  <main>
    <section class="donation" style="padding-top:6rem;">
      <div class="section-header">
        <div>
          <h2>Criar Novo Post</h2>
          <p class="section-subtitle">Publique uma necessidade ou uma doação</p>
        </div>
        <a href="listar.php" class="btn secondary">Voltar</a>
      </div>

      <form action="../../controller/PostController/add.php" method="post" enctype="multipart/form-data" class="form-container" style="max-width:800px;margin:0 auto;background:var(--secondary-color);padding:2rem;border-radius:12px;">
        <div class="form-group">
          <label>Título</label>
          <input type="text" name="titulo" required />
        </div>
        <div class="form-group">
          <label>Descrição</label>
          <textarea name="descricao" rows="6" required></textarea>
        </div>
        <div class="form-group">
          <label>Categoria</label>
          <input type="text" name="categoria" placeholder="Ex: Alimentação, Educação, Saúde" required />
        </div>
        <div class="form-group">
          <label>Cidade</label>
          <input type="text" name="cidade" required />
        </div>
        <div class="form-group">
          <label>Tipo</label>
          <?php $preTipo = strtolower(trim($_GET['tipo'] ?? 'necessidade')); ?>
          <select name="tipo">
            <option value="necessidade" <?php echo $preTipo === 'necessidade' ? 'selected' : ''; ?>>Necessidade</option>
            <option value="doacao" <?php echo $preTipo === 'doacao' ? 'selected' : ''; ?>>Doação</option>
          </select>
        </div>
        <div class="form-group">
          <label>Imagem (opcional)</label>
          <input type="file" name="imagem" accept="image/*" />
        </div>
        <div class="form-group">
          <button type="submit" class="btn primary">Publicar</button>
        </div>
      </form>
    </section>
  </main>
  <?php include_once __DIR__ . '/../assets/Header_Footer/Footer.php'; ?>
<?php
require_once __DIR__ . '/../../model/Post_class.php';
require_once __DIR__ . '/../../dao/PostDAO_class.php';
require_once __DIR__ . '/../../model/Usuario_class.php';

if (session_status() === PHP_SESSION_NONE) session_start();
$usuario = $_SESSION['usuario'] ?? null;
if (!$usuario) {
    header('Location: ../../view/Usuario/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id'] ?? 0);
    $dao = new PostDAO();
    $post = $dao->findById($id);
    if (!$post) { header('Location: ../../view/Posts/listar.php'); exit; }
    // Only allow owner to edit
    if ($post->getUsuarioId() != $usuario->getId()) { header('Location: ../../view/Posts/listar.php'); exit; }

    $titulo = trim($_POST['titulo'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');
    $tipo = trim($_POST['tipo'] ?? 'necessidade');
    $cidade = trim($_POST['cidade'] ?? '');

    // upload image (optional)
    $imagemPath = $post->getImagem();
    if (!empty($_FILES['imagem']['name'])) {
        $uploadDir = __DIR__ . '/../../view/assets/img/necessidades/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
        $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $fileName = time() . '_' . uniqid() . '.' . $ext;
        $target = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $target)) {
            $imagemPath = 'view/assets/img/necessidades/' . $fileName;
        }
    }

    $post->setTitulo($titulo);
    $post->setDescricao($descricao);
    $post->setCategoria($categoria);
    $post->setTipo($tipo);
    $post->setCidade($cidade);
    $post->setImagem($imagemPath);

    $dao->update($post);
    header('Location: ../../view/Posts/ver.php?id=' . $id);
    exit;
}

header('Location: ../../view/Posts/listar.php');
exit;

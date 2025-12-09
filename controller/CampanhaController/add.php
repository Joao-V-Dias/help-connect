<?php
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . '/../..');
}
require_once ROOT_PATH . '/model/CampanhaModel/Campanha_class.php';
require_once ROOT_PATH . '/model/CampanhaModel/CampanhaDAO_class.php';
require_once ROOT_PATH . '/model/UsuarioModel/Usuario_class.php';

if (session_status() === PHP_SESSION_NONE) session_start();
$usuario = $_SESSION['usuario'] ?? null;
if (!$usuario) {
    header('Location: ../../view/Usuario/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');
    $tipo = trim($_POST['tipo'] ?? 'necessidade');
    $cidade = trim($_POST['cidade'] ?? '');

    $imagemPath = null;
    if (!empty($_FILES['imagem']['name'])) {
        $uploadDir = __DIR__ . '/../../view/assets/img/necessidades/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
        $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $fileName = time() . '_' . uniqid() . '.' . $ext;
        $target = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $target)) {
            $imagemPath = '/help-connect/view/assets/img/necessidades/' . $fileName;
        }
    }

    $campanha = new Campanha();
    $campanha->setTitulo($titulo);
    $campanha->setDescricao($descricao);
    $campanha->setCategoria($categoria);
    $campanha->setTipo($tipo);
    $campanha->setCidade($cidade);
    $campanha->setUsuarioId($usuario->getId());
    $campanha->setImagem($imagemPath);

    $dao = new CampanhaDAO();
    $id = $dao->create($campanha);

    header('Location: ../../view/CampanhaView/listar.php');
    exit;
}

header('Location: ../../view/CampanhaView/cadastrar.php');
exit;

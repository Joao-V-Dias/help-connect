<?php
require_once __DIR__ . '/../../model/CampanhaModel/CampanhaDAO_class.php';
require_once __DIR__ . '/../../model/Usuario_class.php';

if (session_status() === PHP_SESSION_NONE) session_start();
$usuario = $_SESSION['usuario'] ?? null;
if (!$usuario) {
    header('Location: ../../view/Usuario/login.php');
    exit;
}

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    header('Location: ../../view/Posts/listar.php');
    exit;
}

$dao = new CampanhaDAO();
$post = $dao->findById($id);
if (!$post) {
    header('Location: ../../view/Posts/listar.php');
    exit;
}
if ($post->getUsuarioId() != $usuario->getId()) {
    header('Location: ../../view/Posts/listar.php');
    exit;
}

$dao->delete($id);
header('Location: ../../view/Posts/listar.php');
exit;

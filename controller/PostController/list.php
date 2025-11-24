<?php
require_once __DIR__ . '/../../dao/PostDAO_class.php';

$tipo = $_GET['tipo'] ?? null; // 'necessidade' or 'doacao' or null
$dao = new PostDAO();
if ($tipo) {
    $posts = $dao->findAllByTipo($tipo);
} else {
    $posts = $dao->findAll();
}

// Simple JSON output if requested, otherwise redirect to view
if (isset($_GET['format']) && $_GET['format'] === 'json') {
    header('Content-Type: application/json');
    echo json_encode($posts);
    exit;
}

header('Location: ../../view/Posts/listar.php?tipo=' . urlencode($tipo ?? ''));
exit;

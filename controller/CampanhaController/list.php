<?php
require_once __DIR__ . '/../../model/CampanhaModel/CampanhaDAO_class.php';

$dao = new CampanhaDAO();
$posts = $dao->findAll();

if (isset($_GET['format']) && $_GET['format'] === 'json') {
    header('Content-Type: application/json');
    echo json_encode($posts);
    exit;
}

header('Location: ../../view/Posts/listar.php?tipo=' . urlencode($tipo ?? ''));
exit;

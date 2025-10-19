<?php
    include_once("controle/BuscarUsuario_class.php");
    $pag = new BuscarUsuario();
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
</head>
<body>
    <h1><?php echo $cont->getNome() ?></h1>
</body>
</html>
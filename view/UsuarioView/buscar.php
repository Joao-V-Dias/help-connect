<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Perfil - HelpConnect</title>
	<link rel="stylesheet" href="/help-connect/view/assets/css/buscar.css">
</head>

<body>
	<?php
	include_once ROOT_PATH . '/view/assets/Static/Header.php';
	?>

	<main class="profile-container">
		<div class="profile-card">
			<img src="<?php echo "./view/" . $perfil->getFoto(); ?>" alt="Foto de <?php echo $perfil->getNome(); ?>" class="profile-img">
			<div class="profile-header">
				<h2><?php echo $perfil->getNome(); ?></h2>
			</div>

			<div class="profile-info">
				<div><strong>E-mail:</strong> <?php echo $perfil->getEmail(); ?></div>
				<div><strong>Telefone:</strong> <?php echo $perfil->getTelefone(); ?></div>
				<div><strong>Cidade:</strong> <?php echo $perfil->getCidade(); ?></div>
			</div>
		</div>

	</main>
</body>

</html>
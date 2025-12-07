<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Perfil - HelpConnect</title>
	<link rel="stylesheet" href="../assets/css/style.css">
	<style>
		.profile-container {
			padding: 8rem 10%;
			/* deixa espaço para header fixo do style.css */
			display: flex;
			justify-content: center;
			align-items: flex-start;
			min-height: 80vh;
			background-color: #f5f7fb;
		}

		.profile-card {
			width: 40rem;
			background: var(--secondary-color);
			border-radius: 8px;
			box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
			padding: 2rem;
			display: flex;
			gap: 1.5rem;
			flex-direction: column;
			align-items: center;
			text-align: center;
		}

		.profile-img {
			width: 10rem;
			height: 10rem;
			object-fit: cover;
			border-radius: 50%;
			border: 6px solid var(--primary-color);
			transform: translateY(-3rem);
			background: #fff;
		}

		.profile-header {
			margin-top: -2rem;
		}

		.profile-info {
			width: 100%;
			display: flex;
			flex-direction: column;
			gap: .5rem;
			color: var(--quaternary-color);
			margin-top: .5rem;
		}

		.profile-actions {
			width: 100%;
			display: flex;
			gap: 1rem;
			justify-content: center;
			margin-top: 1rem;
		}

		.profile-actions .btn {
			padding: .6rem 1rem;
			border-radius: 6px;
			cursor: pointer;
		}

		.meta {
			font-size: 0.95rem;
			color: #666;
		}

		@media (max-width: 600px) {
			.profile-card {
				width: 95%;
			}

			.profile-img {
				width: 8rem;
				height: 8rem;
			}
		}
	</style>
</head>

<body>
	<?php
	include_once __DIR__ . '/../assets/Header_Footer/Header.php';
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



			<!-- <div class="profile-actions">
				<a class="btn" href="../../index.php">Voltar</a>
			</div> -->
		</div>

	</main>
	<?php
	include_once __DIR__ . '/../assets/Header_Footer/Footer.php';
	?>
</body>

</html>
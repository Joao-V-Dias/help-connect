<?php
require_once __DIR__ . '/../model/Usuario_class.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$usuario = $_SESSION['usuario'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página Não Encontrada</title>
    <link rel="stylesheet" href="./assets/css/config.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
        .error-main {
            min-height: calc(100vh - var(--footer-height, 80px));
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem 10%;
            background: linear-gradient(135deg, var(--bg-light), var(--secondary-color));
        }

        .error-card {
            max-width: 920px;
            width: 100%;
            background: var(--secondary-color);
            color: var(--text-dark);
            border-radius: var(--border-radius);
            padding: 2.5rem;
            box-shadow: var(--shadow-lg);
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 1.5rem;
            align-items: center;
        }

        .error-illustration {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-illustration svg {
            width: 180px;
            height: 180px;
        }

        .error-content h1 {
            font-size: 3rem;
            margin: 0 0 0.5rem 0;
            color: var(--primary-color);
        }

        .error-content p {
            margin: 0 0 1rem 0;
            color: var(--text-dark);
        }

        .error-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        @media (max-width: 768px) {
            .error-card {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .error-illustration svg {
                width: 140px;
                height: 140px;
            }

            .error-content h1 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>

<body>
    <?php include_once __DIR__ . '/assets/Header_Footer/Header.php'; ?>

    <main class="error-main">
        <div class="error-card">
            <div class="error-illustration" aria-hidden="true">
                <!-- friendly SVG illustration -->
                <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Página não encontrada">
                    <rect width="64" height="64" rx="8" fill="var(--tertiary-color)" opacity="0.12" />
                    <path d="M20 44h24" stroke="var(--tertiary-color)" stroke-width="2" stroke-linecap="round" />
                    <path d="M32 16v18" stroke="var(--primary-color)" stroke-width="3" stroke-linecap="round" />
                    <circle cx="32" cy="32" r="10" fill="none" stroke="var(--primary-color)" stroke-width="2" />
                </svg>
            </div>

            <div class="error-content">
                <h1>404</h1>
                <h2 class="error-title">Página não encontrada</h2>
                <p>Desculpe — não conseguimos encontrar a página solicitada. Ela pode ter sido movida, excluída ou o endereço está incorreto.</p>

                <div class="error-actions">
                    <a href="/help-connect/index.php" class="btn primary">Voltar ao Início</a>
                    <a href="javascript:history.back()" class="btn secondary">Voltar</a>
                </div>
            </div>
        </div>
    </main>

    <?php include_once __DIR__ . '/assets/Header_Footer/Footer.php'; ?>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página Não Encontrada</title>
    <style>
        @import url(./visao/assets/css/config.css);

        body {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            max-width: 600px;
        }

        .error-code {
            font-size: var(--font-size-xl);
            font-weight: 700;
            color: var(--secondary-color);
        }

        .error-message {
            font-size: var(--font-size-lg);
            margin: 20px 0;
            color: var(--secondary-color);
        }

        .error-description {
            font-size: var(--font-size-md);
            color: var(--secondary-color);
            margin-bottom: 30px;
        }

        .back-home {
            font-size: var(--font-size-sm);
            text-decoration: none;
            color: var(--secondary-color);
            background-color: var(--tertiary-color);
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-home:hover {
            background-color: var(--quaternary-color);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-code">404</div>
        <div class="error-message">Página Não Encontrada</div>
        <div class="error-description">
            Desculpe, a página que você está procurando não existe. Ela pode ter sido movida ou excluída.
        </div>
        <a href="?url=" class="back-home">Voltar para a Página Inicial</a>
    </div>
</body>
</html>
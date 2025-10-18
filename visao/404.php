<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página Não Encontrada</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        :root {
            /* cores */
            --primary-color: #002147;
            --secondary-color: #ffffff;
            --tertiary-color: #cc0202;
            --quaternary-color: #182746;
            /* fontes */
            --font-size-xl: 96px;
            --font-size-lg: 32px;
            --font-size-md: 20px;
            --font-size-sm: 16px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

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
            color: var(--secondary-color); /* Alterado para melhorar contraste */
        }

        .error-message {
            font-size: var(--font-size-lg);
            margin: 20px 0;
            color: var(--secondary-color); /* Alterado para melhorar contraste */
        }

        .error-description {
            font-size: var(--font-size-md);
            color: var(--secondary-color); /* Alterado para melhorar contraste */
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
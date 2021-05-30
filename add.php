<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuário</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="content">

        <div class="contact">
            <h2 class="page-title">Adicionar Usuário</h2>
            <form action="add_action.php" method="POST">
                <input type="text" name="name" id="name"
                    placeholder="Nome" class="field">
                <input type="text" name="email" id="email"
                    placeholder="E-mail" class="field">

                <button type="submit">Cadastrar</button>
            </form>
        </div>

    </main>
</body>
</html>
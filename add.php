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
    <main>
        <form action="add_action.php" method="POST">
            <div>
                <label for="name">Nome</label>
                <input type="text" name="name" id="name">
            </div>

            <div>
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email">
            </div>

            <button type="submit">Cadastrar</button>
        </form>
    </main>
</body>
</html>
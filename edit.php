<?php
require_once 'config.php';
require_once 'dao/UserDaoMysql.php';

$userDao = new UserDaoMysql($pdo);

$user = false;

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id) {
    $user = $userDao->findById($id);
}

if ($user === false) {
    header('Location> index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <form action="edit_action.php" method="POST">

            <input type="hidden" name="id" value="<?= $user->getId() ?>">
            <div>
                <label for="name">Nome</label>
                <input type="text" name="name" id="name"
                    value="<?= $user->getName() ?>">
            </div>

            <div>
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email"
                    value="<?= $user->getEmail() ?>">
            </div>

            <button type="submit">Salvar</button>
        </form>
    </main>
</body>
</html>
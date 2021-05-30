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
    header('Location: index.php');
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
    <main class="content">

        <div class="contact">
            <h2 class="page-title">Editar Usuário</h2>
            <form action="edit_action.php" method="POST">
                <input type="hidden" name="id" value="<?= $user->getId() ?>">
                    <input type="text" name="name" id="name"
                        value="<?= $user->getName() ?>"
                            class="field">
                    <input type="text" name="email" id="email"
                        value="<?= $user->getEmail() ?>"
                            class="field">

                <button type="submit">Salvar</button>
            </form>
        </div>

    </main>
</body>
</html>
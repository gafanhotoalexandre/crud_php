<?php
    require_once 'config.php';
    require_once 'dao/UserDaoMysql.php';

    $userDao = new UserDaoMysql($pdo);
    $users = $userDao->findAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Usuários</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <main>

        <p class="link">
            <a href="add.php">Adicionar Usuário</a>
        </p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>E-MAIL</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($users as $user): ?>
                    <tr style="text-align: center;">
                        <td><?= $user->getId() ?></td>
                        <td><?= $user->getName() ?></td>
                        <td><?= $user->getEmail() ?></td>
                        <td>
                            <a href="edit.php?id=<?= $user->getId() ?>">[ Editar ]</a>
                            <a href="delete.php?id=<?= $user->getId() ?>"
                                onclick="return confirm('Tem certeza?')">[ Excluir ]</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </main>

</body>
</html>
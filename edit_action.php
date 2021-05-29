<?php

require_once 'config.php';
require_once 'dao/UserDaoMysql.php';

$userDao = new UserDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($id && $name && $email) {
    // $user = $userDao->findById($id);// evitando consulta ao banco de dados
    $user = new User();
    $user->setId($id);
    $user->setName($name);
    $user->setEmail($email);

    $userDao->update($user);

    header('Location: index.php');
    exit;
}

header('Location: edit.php?id='. $id);
exit;
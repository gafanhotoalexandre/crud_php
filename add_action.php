<?php

require_once 'config.php';
require_once 'dao/UserDaoMysql.php';

$userDao = new UserDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($name && $email) {
    if (! $userDao->findByEmail($email)) {
        $newUser = new User();
        $newUser->setName($name);
        $newUser->setEmail($email);

        $userDao->add($newUser);

        header('Location: index.php');
        exit;
    }
}
header('Location: add.php');
exit;



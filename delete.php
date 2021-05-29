<?php

require_once 'config.php';
require_once 'dao/UserDaoMysql.php';

$userDao = new UserDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id) {

    $userDao->delete($id);
    
}

header('Location: index.php');
exit;
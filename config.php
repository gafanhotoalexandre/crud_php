<?php

// Config
$dbName = 'app_crud';
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';

// Connection
try {

    $pdo = new PDO(
        "mysql:dbname=$dbName;host=$dbHost",
        "$dbUser",
        "$dbPass");

} catch (PDOException $e) {
    echo $e->getMessage();
}
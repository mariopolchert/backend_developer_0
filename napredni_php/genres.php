<?php

require_once 'functions.php';

// $config = require 'config.php';
// $config = [
//     'host' => 'localhost',
//     'dbname' => 'videoteka',
//     'user' => 'algebra',
//     'password' => 'algebra',
//     'charset' => 'utf8mb4'
// ];

// $dsn = "mysql:" . http_build_query($config, '', ';');

$dsn = 'mysql:host=localhost;dbname=videoteka;user=algebra;password=algebra;charset=utf8mb4';

try {
    $pdo = new PDO($dsn);
} catch (\Throwable $th) {
    die("Connection failed:");
}

$sql = "SELECT * from zanrovi";
$statement = $pdo->prepare($sql);
$statement->execute();

$genres = $statement->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Zanrovi';

require 'genres.view.php';
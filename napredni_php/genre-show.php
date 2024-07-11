<?php

require_once 'functions.php';

$config = require 'config.php';
$dsn = "mysql:" . http_build_query($config['database'], '', ';');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $pdo = new PDO($dsn, options:$config['options']);
    
        $sql = "SELECT * from zanrovi WHERE id = :id";
    
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);
    
        $genre = $stmt->fetch();

    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    require 'genre-show.view.php';
}else {
    die('Unsupported request method!');
}





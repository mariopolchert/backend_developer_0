<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = new Database();

    try {
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





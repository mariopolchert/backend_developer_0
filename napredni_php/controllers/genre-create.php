<?php

require_once '../functions.php';
require_once '../Database.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $zanrName = $_POST['zanr'];

    
    $db = new Database();

    // check if name already exsists in db
    $sql = "SELECT id FROM zanrovi WHERE ime = ?";
    $count = $db->query($sql, [$zanrName]);

    if(!empty($count)){
        die("Ime $zanrName vec postoji u nasoj bazi!");
    }
    
    $sql = "INSERT INTO zanrovi (ime) VALUES (:ime)";

    try {
        $success = $db->query($sql, ['ime' => $zanrName]);
    } catch (\Throwable $th) {
        throw $th;
    }

    http_response_code(200);
    header('Location:/controllers/genres.php');
}

require '../views/genre-create.view.php';

















































if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // TODO: do a validation!!!
    $imeZanra = $_POST['zanr'];

    try {
        $pdo = new PDO($dsn, options:$config['options']);
    
        $sql = "INSERT INTO zanrovi (ime) VALUES (:ime)";
    
        $stmt = $pdo->prepare($sql);

        $success = $stmt->execute([
            'ime' => $imeZanra
        ]);
    
        if ($success) {
            http_response_code(200);
            header('Location:genres.php');
        }else {
            die('Unable to save to the database!');
        }
    
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}else {
    require '../views/genre-create.view.php';
}



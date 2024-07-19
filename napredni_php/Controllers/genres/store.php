<?php

use Core\Database;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $zanrName = $_POST['zanr'];

    $db = new Database();

    $sql = "SELECT id FROM zanrovi WHERE ime = ?";
    $genres = $db->query($sql, [$zanrName]);

    if(!empty($genres)){
        die("Ime $zanrName vec postoji u nasoj bazi!");
    }
    
    $sql = "INSERT INTO zanrovi (ime) VALUES (:ime)";

    try {
        $db->query($sql, ['ime' => $zanrName]);
    } catch (\Throwable $th) {
        throw $th;
    }

    redirect('genres');
} else {
    dd('Unsupported method!');
}

<?php

use Core\Database;

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    dd('Unsupported method!');
}
    
$zanrName = $_POST['zanr'];

$db = new Database();

$sql = "SELECT id FROM zanrovi WHERE ime = ?";
$genres = $db->query($sql, [$zanrName])->find();

if(!empty($genres)){
    die("Ime $zanrName vec postoji u nasoj bazi!");
}

$sql = "INSERT INTO zanrovi (ime) VALUES (:ime)";

$db->query($sql, ['ime' => $zanrName]);

redirect('genres');

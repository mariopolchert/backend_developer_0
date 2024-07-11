<?php

require_once '../functions.php';
require_once '../Database.php';

$db = new Database();

try {
    $sql = "SELECT * from zanrovi ORDER BY id";
    $genres = $db->query($sql);
} catch (\Exception $exception) {
    die("Connection failed: {$exception->getmessage()}");
}

$pageTitle = 'Zanrovi';

require '../views/genres.view.php';
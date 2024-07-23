<?php

use Core\Database;

$db = new Database();

$sql = "SELECT * from zanrovi ORDER BY id";
$genres = $db->query($sql)->all();

$pageTitle = 'Zanrovi';

require '../views/genres/index.view.php';
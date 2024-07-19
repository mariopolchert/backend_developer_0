<?php

use Core\Database;

$db = new Database();

try {
    $sql = "SELECT * FROM zanrovi ORDER BY id";

    $genres = $db->query($sql);

} catch (\Exception $exception) {
    $genres = [];
}

try {
    $sql = "SELECT * FROM cjenik ORDER BY id";

    $prices = $db->query($sql);

} catch (\Exception $exception) {
    $prices = [];
}

require base_path('views/movies/create.view.php');

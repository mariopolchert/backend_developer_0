<?php

use Core\Database;

if (!isset($_GET['id'])) {
    abort();
}

$db = new Database();

$genre = $db->query('SELECT * FROM zanrovi WHERE id = ?', [$_GET['id']])->findOrFail();

$pageTitle = 'Zanrovi';

require base_path('views/genres/edit.view.php');

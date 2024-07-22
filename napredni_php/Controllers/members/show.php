<?php

use Core\Database;

if (!isset($_GET['id'])) {
    abort();
}

$id = $_GET['id'];

$db = new Database();

$sql = "SELECT * from clanovi WHERE id = :id";

$member = $db->query($sql, ['id' => $id])->findOrFail();

$pageTitle = 'Clanovi';

require base_path('views/members/show.view.php');


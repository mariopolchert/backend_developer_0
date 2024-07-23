<?php

use Core\Database;

if (!isset($_GET['id'])) {
    abort();
}

$db = new Database();

$sql = "SELECT * from clanovi WHERE id = :id";
$member = $db->query($sql, ['id' => $_GET['id']])->findOrFail();

$pageTitle = 'Clan';

require base_path('views/members/show.view.php');


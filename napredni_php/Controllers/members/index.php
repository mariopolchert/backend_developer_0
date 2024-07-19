<?php

use Core\Database;

$db = new Database();

try {
    $sql = "SELECT * from clanovi ORDER BY id";
    $members = $db->query($sql);
} catch (\Exception $exception) {
    die("Connection failed: {$exception->getmessage()}");
}

$pageTitle = 'Clanovi';

require base_path('views/members/index.view.php');
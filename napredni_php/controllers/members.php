<?php

// MVC pattern -> Model - View - Controller

require_once '../Database.php';

$db = new Database();

try {
    $sql = "SELECT * FROM clanovi";
    $members = $db->query($sql);
} catch (\Exception $exception) {
    die("Connection failed: {$exception->getmessage()}");
}

require '../views/members.view.php';

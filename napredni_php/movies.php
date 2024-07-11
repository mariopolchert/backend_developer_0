<?php

require_once 'functions.php';

$config = require 'config.php';
$dsn = "mysql:" . http_build_query($config['database'], '', ';');

try {
    $pdo = new PDO($dsn, options:$config['options']);

    $sql = "SELECT
                f.id,
                f.naslov,
                f.godina,
                z.ime AS zanr,
                c.tip_filma
            from
                filmovi f
                JOIN cjenik c ON f.cjenik_id = c.id
                JOIN zanrovi z ON f.zanr_id = z.id
            ORDER BY
                f.id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $movies = $stmt->fetchAll();

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

require 'movies.view.php';
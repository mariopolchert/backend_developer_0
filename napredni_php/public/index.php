<?php

require_once '../functions.php';
require_once base_path('Database.php');

$uri = parse_url($_SERVER['REQUEST_URI'])["path"];


switch ($uri) {
    case '/':
        require base_path('controllers/home.php');
        break;
    case '/members':
        require base_path('controllers/members.php');
        break;
    case '/genres':
        require base_path('controllers/genres/index.php');
        break;
    case '/genres/create':
        require base_path('controllers/genres/create.php');
        break;
    case '/genres/store':
        require base_path('controllers/genres/store.php');
        break;
    case '/movies':
        require base_path('controllers/movies.php');
        break;
    default:
        abort();
}
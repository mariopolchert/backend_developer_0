<?php

use Controllers\genres\GenresController;

$router->get('/genres', [GenresController::class, 'index']);
$router->get('/genres/show', [GenresController::class, 'show']);
$router->delete('/genres/destroy', [GenresController::class, 'destroy']);

return [
    '/'                 => 'Controllers/home.php',
    '/dashboard'        => 'Controllers/dashboard/index.php',

    '/members'          => 'Controllers/members/index.php',
    '/members/show'     => 'Controllers/members/show.php',
    '/members/create'   => 'Controllers/members/create.php',
    '/members/store'    => 'Controllers/members/store.php',
    '/members/edit'     => 'Controllers/members/edit.php',
    '/members/update'   => 'Controllers/members/update.php',
    '/members/destroy'  => 'Controllers/members/destroy.php',

    '/genres'           => [GenresController::class, 'index'],
    '/genres/show'      => [GenresController::class, 'show'],
    '/genres/create'    => [GenresController::class, 'create'],
    '/genres/store'     => [GenresController::class, 'store'],
    '/genres/edit'      => [GenresController::class, 'edit'],
    '/genres/update'    => [GenresController::class, 'update'],
    '/genres/destroy'   => [GenresController::class, 'destroy'],

    '/movies'           => 'Controllers/movies/index.php',
    '/movies/show'      => 'Controllers/movies/show.php',
    '/movies/create'    => 'Controllers/movies/create.php',
    '/movies/store'     => 'Controllers/movies/store.php',
    '/movies/edit'      => 'Controllers/movies/edit.php',
    '/movies/update'    => 'Controllers/movies/update.php',
    '/movies/destroy'   => 'Controllers/movies/destroy.php',

    '/formats'          => 'Controllers/formats/index.php',
    '/formats/show'     => 'Controllers/formats/show.php',
    '/formats/create'   => 'Controllers/formats/create.php',
    '/formats/store'    => 'Controllers/formats/store.php',
    '/formats/edit'     => 'Controllers/formats/edit.php',
    '/formats/update'   => 'Controllers/formats/update.php',
    '/formats/destroy'  => 'Controllers/formats/destroy.php',

    '/rentals/destroy'  => 'Controllers/rentals/destroy.php',
];
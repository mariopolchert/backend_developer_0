<?php use Core\Session; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($pageTitle) ? $pageTitle : 'Videoteka Admin' ?></title>
    <title><?= $pageTitle ?? 'Videoteka Admin' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/assets/styles.css">
  </head>
  <body>
    <div class="page-wrapper d-flex h-100">

        <?php include_once 'sidebar.php' ?>
        
        <div class="content d-flex flex-column flex-grow-1">
            <?php include_once 'nav.php' ?>

            <?php if ($message = Session::get('message')): ?>
              <div class="alert alert-<?= $message['type'] ?> alert-dismissible fade show" role="alert">
                <?= $message['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>
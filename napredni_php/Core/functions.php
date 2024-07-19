<?php

function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}

function base_path($path): string
{
    return dirname(__DIR__) . DIRECTORY_SEPARATOR . $path;
}

function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/errors/404.php");
    die;
}

function redirect($path)
{
    header("Location:/$path");
    exit();
}

function isCurrent(string $link, $defaultReturn = "active"): string
{
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $link = "/" . $link;

    if (str_starts_with($uri, $link)){
        return $defaultReturn;
    } else {
        return '';
    }
}


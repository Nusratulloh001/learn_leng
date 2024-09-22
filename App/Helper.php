<?php

function d (mixed ...$value): void
{
    echo "<pre style='font-family: jetBrains Mono'>";
    print_r($value);
    echo "</pre>";
}


function dd (mixed ...$value) {
    echo "<pre style='font-family: jetBrains Mono'>";
    print_r($value);
    echo "</pre>";
    die();
}

function ref (object $object) {
    echo '<pre>';
    echo new ReflectionClass($object);
    echo '</pre>';
}

function abort ($url, $status_code = 404){
    redirect($url, $status_code);
}

function redirect ($url, $status_code = 200){
    http_response_code($status_code);
    header("Location: {$url}", response_code: $status_code);
    exit();
}

function isUrl (string $url) : bool {
    return $_SERVER['REQUEST_URI'] === $url;
}

function view ($view, $data = [])
{
    extract($data);
    require __DIR__ . '/../App/Views/' . $view . '.view.php';
}
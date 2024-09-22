<?php

session_start();

use App\Classes\Route;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/Helper.php';
require __DIR__ . '/app.php';

echo Route::dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
<?php

if (!defined('ROOT_DIR')) {
    define('ROOT_DIR', __DIR__);
}

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
if (file_exists(".env")) {
    $dotenv->overload();
}

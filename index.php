<?php

declare(strict_types=1);

use App\Router\Router;

session_start();

if (!file_exists('config.php')) {
    die('You forget to copy <b>config.php.bak</b> to <b>config.php</b> and setup database connection credentials');
}
require_once 'config.php';
require_once __DIR__ . '/vendor/autoload.php';

$router = new Router();
$router->match();

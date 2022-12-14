<?php

declare(strict_types=1);

use App\Router\Router;

session_start();

require_once 'config.php';
require_once __DIR__ . '/vendor/autoload.php';

$router = new Router();
$router->match();

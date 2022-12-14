<?php

declare(strict_types=1);

namespace App\Router;

class Router implements RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(): void
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        if (str_contains($requestUri, '?')) {
            $requestUri = strstr($requestUri, '?', true);
        }
        $className = str_replace('/', '', $requestUri);
        $className = ucfirst($className);
        $className = sprintf('\App\Controller\%s', (strlen($className) === 0) ? 'Index' : $className);
        $controller = new $className();
        $controller->execute();
    }
}
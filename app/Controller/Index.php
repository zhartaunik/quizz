<?php

declare(strict_types=1);

namespace App\Controller;

class Index implements ControllerInterface
{
    public function execute(): void
    {
        echo 'Hello World';
    }
}
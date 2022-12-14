<?php

declare(strict_types=1);

namespace App\Router;

interface RouterInterface
{
    /**
     * Identify which controller to use
     * Matching browser request URLs with our controllers
     *
     * @return void
     */
    public function match(): void;
}
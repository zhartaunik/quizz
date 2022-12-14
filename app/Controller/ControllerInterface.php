<?php

declare(strict_types=1);

namespace App\Controller;

interface ControllerInterface
{
    /**
     * This is a basic controller which render all the pages on the website.
     *
     * @return void
     */
    public function execute(): void;
}
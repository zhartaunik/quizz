<?php

declare(strict_types=1);

namespace App\Controller;

class Index implements ControllerInterface
{
    /**
     * Base action. Redirect to the first question.
     *
     * @return void
     */
    public function execute(): void
    {
        header("Location: /question?question_id=1");
    }
}
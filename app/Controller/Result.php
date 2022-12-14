<?php

declare(strict_types=1);

namespace App\Controller;

class Result implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        echo '<h1>Your result is: </h1>';
        foreach ($_SESSION['answers'] as $key => $oneAnswer) {
            if ($oneAnswer) {
                echo sprintf('<p style="color: green;"><a href="/question?question_id=%s">%s</a> - correct</p>', $key, $key);
            } else {
                echo sprintf('<p style="color: red;"><a href="/question?question_id=%s">%s</a> - incorrect</p>', $key, $key);
            }
        }
        echo sprintf('<a href="/question?question_id=1">Follow to the first question</a>');
    }
}
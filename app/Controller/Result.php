<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Block\Renderer;
use App\Model\Question\Model;

class Result implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        $questions = new Model();
        $results = array_replace(
            array_fill(1, $questions->getTotal(), false),
            $_SESSION['answers'] ?? []
        );

        $block = new Renderer();
        $block->render('results.phtml', ['results' => $results]);
    }
}
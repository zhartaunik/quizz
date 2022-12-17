<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Answers\Model as AnswerModel;
use App\Model\Block\NoTemplateException;
use App\Model\Block\Renderer;
use App\Model\Question\Model as QuestionModel;

class Question implements ControllerInterface
{
    /**
     * Render current question. If it doesn't exist show the link to the results page.
     *
     * @return void
     * @throws NoTemplateException
     */
    public function execute(): void
    {
        $block = new Renderer();
        $questionModel = new QuestionModel();
        $questionId = (int) $_GET['question_id'];
        $question = $questionModel->getQuestion($questionId);
        $answerModel = new AnswerModel();
        empty($question)
            ? $block->render('goto_results.phtml')
            : $block->render(
                'form.phtml',
                ['question' => $question, 'isMultiple' => $answerModel->isMultipleValid($questionId)]
            );
    }
}
<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Answers\Model as AnswersModel;

class QuestionSubmit implements ControllerInterface
{
    /**
     * A POST action to verify if selected answer is correct.
     *
     * Write down into the session result for the question.
     * Redirect to the next question.
     *
     * @return void
     */
    public function execute(): void
    {
        $answers = new AnswersModel();
        $allAnswers = $answers->getAnswers((int) $_POST['question_id']);
        $answersToCompare = array_column($allAnswers, 'is_correct', 'id');
        $_SESSION['answers'][$_POST['question_id']] = ($answersToCompare[$_POST['answer_id']] == 1);
        header(sprintf("Location: /question?question_id=%s", $_POST['question_id'] + 1));
    }
}
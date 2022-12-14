<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Answers\Model as AnswersModel;

class QuestionSubmit implements ControllerInterface
{
    public function execute(): void
    {
        $answers = new AnswersModel();
        $result = $answers->verify((int) $_POST['answer_id']);
        $_SESSION['answers'][$_POST['question_id']] = $result;
        header(sprintf("Location: /question?question_id=%s", $_POST['question_id'] + 1));
    }
}
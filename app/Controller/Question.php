<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Answers\Model as AnswersModel;
use App\Model\Question\Model as QuestionModel;

class Question implements ControllerInterface
{
    public function execute(): void
    {
        $questionModel = new QuestionModel();
        $questionId = (int) $_GET['question_id'];
        $question = $questionModel->getQuestion($questionId);
        if (empty($question)) {
            echo '<a href="/result">Follow to results</a>';
            return;
        }
        echo '<form method="POST" action="questionSubmit">';
        echo sprintf('<h1>%s</h1>', $question['question_title']);
        echo '<br /><br />';
        $answers = new AnswersModel();
        foreach ($answers->getAnswers() as $answer) {
            echo sprintf(
                '<input type="radio" name="answer_id" value="%s">%s<br />',
                $answer['id'],
                $answer['answer_text'],
            );
        }
        echo sprintf('<input type="hidden" name="question_id" value="%s" />', $_GET['question_id']);
        echo '<br /><br />';
        echo '<input type="submit" value="Submit">';
        echo '</form>';
    }
}
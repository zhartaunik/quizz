<?php

declare(strict_types=1);

namespace App\Model\Answers;

use App\Model\Db\Connection;

class Model implements AnswersInterface
{
    /**
     * Get all answers for the desired question.
     *
     * @param int $questionId
     * @return array|null
     */
    public function getAnswers(int $questionId): ?array
    {
        $query = sprintf(/** @lang MySQL */ 'SELECT * FROM answers WHERE question_id = %s', $questionId);
        $answers = Connection::getConnection()->query($query)->fetch_all(MYSQLI_ASSOC);
        shuffle($answers);
        return $answers;
    }

    /**
     * Verify if number of correct answers is more than one.
     *
     * @param int $questionId
     * @return bool
     */
    public function isMultipleValid(int $questionId): bool
    {
        $allAnswers = $this->getAnswers($questionId);
        return array_sum(array_column($allAnswers, 'is_correct')) > 1;
    }
}
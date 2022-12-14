<?php

declare(strict_types=1);

namespace App\Model\Answers;

use App\Model\Db\Connection;

class Model
{
    /**
     * Get all answers for the desired question.
     *
     * @return array|null
     */
    public function getAnswers(): ?array
    {
        $questionId = $_GET['question_id'];
        $query = sprintf(/** @lang MySQL */ 'SELECT * FROM answers WHERE question_id = %s', $questionId);
        $answers = Connection::getConnection()->query($query)->fetch_all(MYSQLI_ASSOC);
        shuffle($answers);
        return $answers;
    }

    /**
     * Check if selected answer is correct.
     *
     * @param int $answerId
     * @return bool
     */
    public function verify(int $answerId): bool
    {
        $query = sprintf(/** @lang MySQL */ 'SELECT is_correct FROM answers WHERE id = %s', $answerId);
        $mysqliResult = Connection::getConnection()->query($query);
        return (bool) $mysqliResult->fetch_column();
    }
}
<?php

declare(strict_types=1);

namespace App\Model\Answers;

use App\Model\Db\Connection;

class Model
{
    /**
     * @return array|null
     */
    public function getAnswers(): ?array
    {
        $questionId = $_GET['question_id'];
        $query = sprintf('SELECT * FROM answers WHERE question_id = %s', $questionId);
        return Connection::getConnection()->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function verify(int $answerId): bool
    {
        $query = sprintf('SELECT is_correct FROM answers WHERE id = %s', $answerId);
        $mysqliResult = Connection::getConnection()->query($query);
        return (bool) $mysqliResult->fetch_column();
    }
}
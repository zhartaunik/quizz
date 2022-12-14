<?php

declare(strict_types=1);

namespace App\Model\Question;

use App\Model\Db\Connection;

class Model
{
    /**
     * @param int $questionId
     * @return array|null
     */
    public function getQuestion(int $questionId): ?array
    {
        $query = sprintf('SELECT * FROM questions WHERE id = %s', $questionId);
        return Connection::getConnection()->query($query)->fetch_assoc();
    }
}
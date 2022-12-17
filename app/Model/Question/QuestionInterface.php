<?php

declare(strict_types=1);

namespace App\Model\Question;

interface QuestionInterface
{
    /**
     * Get question model.
     *
     * @param int $questionId
     * @return array|null
     */
    public function getQuestion(int $questionId): ?array;

    /**
     * Get total number of questions.
     *
     * @return int
     */
    public function getTotal(): int;
}